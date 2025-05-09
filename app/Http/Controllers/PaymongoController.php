<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymongoController extends Controller
{
    public function createCheckoutSession()
    {
        $secretKey = env('PAYMONGO_SECRET_KEY');

        $response = Http::withBasicAuth($secretKey, '')
            ->withHeaders([
                'Content-Type' => 'application/json',
                'accept' => 'application/json',
            ])
            ->post('https://api.paymongo.com/v1/checkout_sessions', [
                'data' => [
                    'attributes' => [
                        'send_email_receipt' => false,
                        'show_description' => true,
                        'show_line_items' => true,
                        'payment_method_types' => [
                            'card',        // Visa and Mastercard only
                        ],
                        'line_items' => [
                            [
                                'currency' => 'PHP',
                                'amount' => 550,
                                'name' => 'Beanines',
                                'description' => 'A fresh bag of coffee beanines.',
                                'quantity' => 100,
                                'images' => [
                                    'https://images.unsplash.com/photo-1612346903007-b5ac8bb135bb?auto=format&fit=crop&w=1740&q=80',
                                ],
                            ],
                            [
                                'currency' => 'PHP',
                                'amount' => 125000,
                                'name' => 'Jasmine Rice 25KG',
                                'description' => 'A locally grown Jasmine Rice.',
                                'quantity' => 1,
                                'images' => [
                                    'https://images.unsplash.com/photo-1612346903007-b5ac8bb135bb?auto=format&fit=crop&w=1740&q=80',
                                ],
                            ],
                        ],
                        'success_url' => 'https://yourdomain.com/checkout-success',
                        'cancel_url' => 'https://yourdomain.com/checkout-cancelled',
                        'billing' => [
                            'name' => 'John Doe',
                            'email' => 'john.doe@paymongo.com',
                            'address' => [
                                'line1' => 'Address Line 1',
                                'line2' => 'Address Line 2',
                                'city' => 'Taguig',
                                'state' => 'PH-MNL',
                                'postal_code' => '1234',
                                'country' => 'PH',
                            ],
                        ],
                        'description' => 'The beanie products.',
                        'reference_number' => 'm2m39sj43h5lfFSA1sd',
                        'metadata' => [
                            'customer_number' => '42jn1i53',
                            'notes' => 'Additional packaging. Include free samples',
                            'remarks' => 'Customer cannot receive items during weekends or evening',
                        ],
                    ],
                ],
            ]);

        return redirect()->away($response['data']['attributes']['checkout_url']);
    }

}
