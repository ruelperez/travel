<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class XenditCustomController extends Controller
{
    public function charge(Request $request)
    {
        $secret = env('XENDIT_SECRET_KEY');

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'amount' => 'required|numeric|min:1',
            'card_number' => 'required|string',
            'exp_date' => 'required|regex:/^\d{2}\/\d{2}$/',
            'cvc' => 'required|string',
        ]);

        [$expMonth, $expYear] = explode('/', $request->exp_date);
        $expMonth = (int) $expMonth;
        $expYear = strlen($expYear) === 2 ? (int)('20' . $expYear) : (int) $expYear;

        try {
            // Step 1: Create Card Token
            $tokenResponse = Http::withBasicAuth($secret, '')
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post('https://api.xendit.co/card_tokens', [
                    'card_number' => preg_replace('/\s+/', '', $request->card_number),
                    'card_exp_month' => (int) $expMonth,
                    'card_exp_year' => (int) $expYear,
                    'card_cvn' => $request->cvc,
                ]);

            if (!$tokenResponse->successful()) {
                return redirect()->route('payment.failed')->with('error', 'Card tokenization failed.');
            }
            $cardToken = $tokenResponse['id'];

            // Step 2: Charge Card
            $chargeResponse = Http::withBasicAuth($secret, '')
                ->post('https://api.xendit.co/credit_card_charges', [
                    'token_id' => $cardToken,
                    'external_id' => 'txn_' . uniqid(),
                    'amount' => $request->amount * 100,
                    'currency' => 'PHP',
                    'card_cvn' => $request->cvc,
                    'capture' => true,
                    'metadata' => [
                        'customer_name' => $request->name,
                        'customer_email' => $request->email,
                        'customer_phone' => $request->phone
                    ]
                ]);

            if (!$chargeResponse->successful()) {
                return redirect()->route('payment.failed')->with('error', 'Card charge failed.');
            }

            Mail::to($request->email)->send(new PaymentReceiptMail([
                'name' => $request->name,
                'email' => $request->email,
                'amount' => $chargeResponse['amount'] / 100,
                'payment_id' => $chargeResponse['id'],
            ]));

            return redirect()->route('payment.success')->with('success', 'Payment successful.');
        } catch (\Exception $e) {
            return redirect()->route('payment.failed')->with('error', $e->getMessage());
        }
    }
}
