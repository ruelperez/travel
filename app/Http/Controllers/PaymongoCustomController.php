<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentReceiptMail;

class PaymongoCustomController extends Controller
{
    public function charge(Request $request)
    {
        $secret = env('PAYMONGO_SECRET_KEY');

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'amount' => 'required',
            'card_number' => 'required|string',
            'exp_date' => 'required',
            'cvc' => 'required|string',
        ]);
        [$expMonth, $expYear] = explode('/', $request->exp_date);

// Convert 2-digit year to 4-digit
        $expYear = strlen($expYear) === 2 ? '20' . $expYear : $expYear;
        $amount = $request->amount * 100;

        // Step 1: Create Payment Intent
        $intentResponse = Http::withBasicAuth($secret, '')
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post('https://api.paymongo.com/v1/payment_intents', [
                'data' => [
                    'attributes' => [
                        'amount' => $amount,
                        'payment_method_allowed' => ['card'],
                        'payment_method_options' => [
                            'card' => ['request_three_d_secure' => 'any']
                        ],
                        'currency' => 'PHP',
                        'description' => 'Custom Card Payment',
                        'statement_descriptor' => 'YourBusiness',
                        'metadata' => [
                            'customer_name' => $request->name,
                            'customer_email' => $request->email,
                            'customer_phone' => $request->phone
                        ]
                    ]
                ]
            ]);

        if (!$intentResponse->successful()) {
            return redirect()->route('payment.failed')->with('error', 'Payment Intent creation failed.');
        }

        $intentId = $intentResponse['data']['id'];

        // Step 2: Create Payment Method
        $paymentMethodResponse = Http::withBasicAuth($secret, '')
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post('https://api.paymongo.com/v1/payment_methods', [
                'data' => [
                    'attributes' => [
                        'type' => 'card',
                        'details' => [
                            'card_number' => preg_replace('/\s+/', '', $request->card_number),
                            'exp_month' =>  (int) $expMonth,
                            'exp_year' => (int) $expYear,
                            'cvc' => $request->cvc
                        ],
                        'billing' => [
                            'name' => $request->name,
                            'email' => $request->email,
                            'phone' => $request->phone,
                            'address' => [
                                'line1' => '123 Test St',
                                'city' => 'New York',
                                'state' => 'NY',
                                'postal_code' => '10001',
                                'country' => 'US'
                            ]
                        ]
                    ]
                ]
            ]);

        if (!$paymentMethodResponse->successful()) {
            return redirect()->route('payment.failed')->with('error', 'Payment Method creation failed.');
        }

        $paymentMethodId = $paymentMethodResponse['data']['id'];

        // Step 3: Attach Payment Method to Payment Intent
        $attachResponse = Http::withBasicAuth($secret, '')
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post("https://api.paymongo.com/v1/payment_intents/{$intentId}/attach", [
                'data' => [
                    'attributes' => [
                        'payment_method' => $paymentMethodId
                    ]
                ]
            ]);

        if (!$attachResponse->successful()) {
            return redirect()->route('payment.failed')->with('error', 'Failed to attach payment method.');
        }

        $final = $attachResponse['data'];
        $status = $final['attributes']['status'];
        if ($status === 'succeeded') {
            // ✅ Send receipt email
            Mail::to($request->email)->send(new PaymentReceiptMail([
                'name' => $request->name,
                'email' => $request->email,
                'amount' => $final['attributes']['amount'] / 100,
                'payment_id' => $final['id'],
            ]));

            return redirect()->route('payment.success')->with('success', 'Payment completed successfully.');
        } else {
            return redirect()->route('payment.failed')->with('error', 'Payment was not successful.');
        }
    }
}
