<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseConfirmationMail;
use App\Models\PurchaseConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class PayPalController extends Controller
{
    public function createOrder(Request $request)
    {
        // Send email
       Mail::to('karuelflorperezz@gmail.com')->send(new \App\Mail\PurchaseConfirmationMail([
           'name' => 'Test User',
           'email' => 'karuelflorperezz@gmail.com',
       ]));
        // Save form data to session
        session([
            'resort_name' => $request->resort_name,
            'package' => $request->package,
        ]);

        $amount = $request->amount;

        $tokenResponse = Http::withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'))
            ->asForm()
            ->post(env('PAYPAL_BASE_URL') . '/v1/oauth2/token', [
                'grant_type' => 'client_credentials'
            ]);

        $accessToken = $tokenResponse['access_token'];

        $orderResponse = Http::withToken($accessToken)
            ->post(env('PAYPAL_BASE_URL') . '/v2/checkout/orders', [
                'intent' => 'CAPTURE',
                'purchase_units' => [[
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => $amount
                    ],
                    'description' => 'Destination Reservation'
                ]],
                'application_context' => [
                    'return_url' => route('paypal.success'),
                    'cancel_url' => route('paypal.cancel'),
                    'shipping_preference' => 'NO_SHIPPING',
                    'user_action' => 'PAY_NOW',
                    'landing_page' => 'LOGIN', // ✅ Forces PayPal to show login page first
                ],
            ]);


        return redirect($orderResponse['links'][1]['href']); // approve link
    }

    public function success(Request $request)
    {
        $resortName = session('resort_name');
        $package = session('package');
        $token = $request->token;

        // Get access token
        $tokenResponse = Http::withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'))
            ->asForm()
            ->post(env('PAYPAL_BASE_URL') . '/v1/oauth2/token', [
                'grant_type' => 'client_credentials'
            ]);

        $accessToken = $tokenResponse['access_token'];

        // Capture payment
        $captureResponse = Http::withToken($accessToken)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post(env('PAYPAL_BASE_URL') . "/v2/checkout/orders/{$token}/capture", null);

        $details = $captureResponse->json();

        $state = $details['payer']['address']['admin_area_1'] ?? null;
        $timezone = $stateTimezones[$state] ?? 'America/New_York';
        $usTime = now()->setTimezone($timezone)->format('m/d/Y h:i:s A');
        $certificateExpire = now()->addMonths(06)->format('m/d/Y');
        $invoiceNumber = strtoupper(uniqid('INV-'));
        $cardInfo = $details['purchase_units'][0]['payments']['captures'][0]['payment_source']['card'] ?? null;
        $cardType = $cardInfo['brand'] ?? 'PayPal';
        $cardNumber = $cardInfo['last_digits'] ?? '************0000';
        $phone = $details['payer']['phone']['phone_number']['national_number'] ?? 'Not provided';

        PurchaseConfirmation::create([
            'name' => $details['payer']['name']['given_name'] . ' ' . $details['payer']['name']['surname'] ?? null,
            'email' => $details['payer']['email_address'] ?? null,
            'phone' => $phone,
            'resort_name' => $resortName,
            'package' => $package,
            'transaction_id' => $details['purchase_units'][0]['payments']['captures'][0]['id'] ?? null,
            'status' => $details['purchase_units'][0]['payments']['captures'][0]['status'] ?? null,
            'amount' => $details['purchase_units'][0]['payments']['captures'][0]['amount']['value'] ?? null,
            'us_time' => $usTime,
            'purchased_date' => $usTime,
            'certificate_expire' => $certificateExpire,
            'invoice_number' => $invoiceNumber,
            'card_type' => $cardType,
            'card_number' => '************' . $cardNumber,
        ]);

        $payers_email = $details['payer']['email_address'] ?? null;
        // Send email
        Mail::to($payers_email)->send(new PurchaseConfirmationMail($details));

        return view('paypal.success', [
            'details' => $details ?? null
        ]);
    }

    public function cancel()
    {
        return view('paypal.cancel');
    }
}
