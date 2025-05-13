<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentReceiptMail;

class XenditCustomController extends Controller
{
    public function charge(Request $request)
    {
        $secret = env('XENDIT_SECRET_KEY');

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'amount' => 'required|numeric|min:1',
            'card_number' => 'required|string',
            'exp_date' => 'required|regex:/^\d{2}\/\d{2}$/',
            'cvc' => 'required|string',
        ]);

        // Convert MM/YY to month/year
        [$expMonth, $expYear] = explode('/', $request->exp_date);
        $expYear = strlen($expYear) === 2 ? '20' . $expYear : $expYear;

        // Convert $ to PHP (mock exchange rate)
        $usdAmount = $request->amount;
        $phpAmount = round($usdAmount * 56.25); // Replace with real rate if needed

        try {
            // 1. Tokenize the card
            $tokenRes = Http::withBasicAuth($secret, '')
                ->post('https://api.xendit.co/card_tokens', [
                    'card_number' => preg_replace('/\s+/', '', $request->card_number),
                    'card_exp_month' => (int) $expMonth,
                    'card_exp_year' => (int) $expYear,
                    'card_cvn' => $request->cvc,
                ]);

            if (!$tokenRes->successful()) {
                return redirect()->route('payment.failed')->with('error', 'Card tokenization failed.');
            }

            $tokenId = $tokenRes['id'];

            // 2. Charge the card
            $chargeRes = Http::withBasicAuth($secret, '')
                ->post('https://api.xendit.co/credit_card_charges', [
                    'token_id' => $tokenId,
                    'external_id' => 'order-' . time(),
                    'amount' => $phpAmount,
                    'currency' => 'PHP',
                    'card_cvn' => $request->cvc,
                    'authentication_id' => $tokenRes['authentication_id'],
                    'customer' => [
                        'given_names' => $request->name,
                        'email' => $request->email,
                        'mobile_number' => $request->phone,
                        'addresses' => [[
                            'country' => 'US',
                            'street_line1' => $request->address,
                            'city' => 'Unknown',
                            'state' => 'Unknown',
                            'postal_code' => '00000'
                        ]]
                    ],
                    'metadata' => [
                        'customer_email' => $request->email,
                        'customer_name' => $request->name,
                        'usd_displayed' => $usdAmount,
                    ]
                ]);

            if (!$chargeRes->successful()) {
                return redirect()->route('payment.failed')->with('error', 'Charge failed: ' . $chargeRes['message']);
            }

            $chargeData = $chargeRes['id'];

            // Send receipt (optional)
            Mail::to($request->email)->send(new PaymentReceiptMail([
                'name' => $request->name,
                'email' => $request->email,
                'amount' => $usdAmount,
                'payment_id' => $chargeData,
            ]));

            return redirect()->route('payment.success')->with('success', 'Payment successful!');

        } catch (\Exception $e) {
            return redirect()->route('payment.failed')->with('error', 'Unexpected error: ' . $e->getMessage());
        }
    }
}
