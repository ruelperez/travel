<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymongoCustomController extends Controller
{
    public function charge(Request $request)
    {
        $secret = env('PAYMONGO_SECRET_KEY');

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'amount' => 'required|numeric|min:20',
            'card_number' => 'required|string',
            'exp_month' => 'required|numeric',
            'exp_year' => 'required|numeric',
            'cvc' => 'required|string',
        ]);

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
            return response()->json([
                'error' => 'Payment Intent creation failed.',
                'details' => $intentResponse->json()
            ], 400);
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
                            'card_number' => $request->card_number,
                            'exp_month' => (int) $request->exp_month,
                            'exp_year' => (int) $request->exp_year,
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
            return response()->json([
                'error' => 'Payment Method creation failed.',
                'details' => $paymentMethodResponse->json()
            ], 400);
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
            return response()->json([
                'error' => 'Failed to attach payment method.',
                'details' => $attachResponse->json()
            ], 400);
        }

        $final = $attachResponse['data'];

        return response()->json([
            'message' => '✅ Payment completed successfully.',
            'status' => $final['attributes']['status'],
            'payment_id' => $final['id'],
            'amount' => $final['attributes']['amount'] / 100,
            'card_used' => $request->card_number,
            'customer' => $request->only('name', 'email', 'phone')
        ]);
    }
}
