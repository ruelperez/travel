<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class XenditCustomController extends Controller
{
    public function charge(Request $request)
    {
        $validated = $request->validate([
            'location_name' => 'required|string',
            'resort_name' => 'required|string',
            'package' => 'required|string',
            'price' => 'required|numeric',
        ]);
        $pera = $request->price; // e.g. $1
        $exchangeRate = 55.81;
        $pesoAmount = $pera * $exchangeRate;

        $response = Http::withBasicAuth(env('XENDIT_SECRET_KEY'), '')
            ->post('https://api.xendit.co/v2/invoices', [
                'external_id' => 'order-' . time(),
                'amount' => (int)$pesoAmount,
                'description' => 'Vacation Reservation',
                'payer_email' => 'karuelflorperezz@gmail.com',
                'currency' => 'PHP',
                'success_redirect_url' => route('checkout.success'),
                'failure_redirect_url' => route('checkout.failed'),
//                'customer' => [
//                    'given_names' => $validated['name'],
//                    'email' => $validated['email'],
//                    'mobile_number' => $validated['phone'],
//                    'addresses' => [[
//                        'country' => 'Philippines',
//                        'street_line1' => $validated['address'],
//                    ]]
//                ]
            ]);

        if ($response->successful()) {
            return redirect($response['invoice_url']);
        }

        return back()->withErrors([
            'xendit_error' => $response->json()['message'] ?? 'Failed to create invoice.',
        ]);
    }

    public function success()
    {
        return '✅ Payment success!';
    }

    public function failed()
    {
        return '❌ Payment failed or canceled.';
    }
}
