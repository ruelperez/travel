<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PayPalController extends Controller
{
    public function createOrder(Request $request)
    {
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
        $token = $request->token;

        // Get OAuth access token
        $tokenResponse = Http::withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'))
            ->asForm()
            ->post(env('PAYPAL_BASE_URL') . '/v1/oauth2/token', [
                'grant_type' => 'client_credentials'
            ]);

        $accessToken = $tokenResponse['access_token'];

        // Capture payment — FIXED version
        $captureResponse = Http::withToken($accessToken)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post(env('PAYPAL_BASE_URL') . "/v2/checkout/orders/{$token}/capture", null);

        $details = $captureResponse->json();

        return view('paypal.success', [
            'details' => $captureResponse->json(),
        ]);
    }

    public function cancel()
    {
        return view('paypal.cancel');
    }
}
