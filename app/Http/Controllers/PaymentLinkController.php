<?php

namespace App\Http\Controllers;

use App\Models\PurchaseConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentLinkController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $headers = [
            'PAYPAL-AUTH-ALGO'       => $request->header('PAYPAL-AUTH-ALGO'),
            'PAYPAL-CERT-URL'        => $request->header('PAYPAL-CERT-URL'),
            'PAYPAL-TRANSMISSION-ID' => $request->header('PAYPAL-TRANSMISSION-ID'),
            'PAYPAL-TRANSMISSION-SIG'=> $request->header('PAYPAL-TRANSMISSION-SIG'),
            'PAYPAL-TRANSMISSION-TIME'=> $request->header('PAYPAL-TRANSMISSION-TIME'),
        ];

        $payload = $request->all();
        $webhookId = config('services.paypal.webhook_id');

        // STEP 1: Get access token
        $tokenResponse = Http::withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'))
            ->asForm()
            ->post(env('PAYPAL_BASE_URL') . '/v1/oauth2/token', [
                'grant_type' => 'client_credentials',
            ]);

        if (!$tokenResponse->ok()) {
            Log::error('PayPal token failed', $tokenResponse->json());
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $accessToken = $tokenResponse['access_token'];

        // STEP 2: Verify the webhook signature
        $verificationResponse = Http::withToken($accessToken)
            ->post(env('PAYPAL_BASE_URL') . '/v1/notifications/verify-webhook-signature', [
                'auth_algo'         => $headers['PAYPAL-AUTH-ALGO'],
                'cert_url'          => $headers['PAYPAL-CERT-URL'],
                'transmission_id'   => $headers['PAYPAL-TRANSMISSION-ID'],
                'transmission_sig'  => $headers['PAYPAL-TRANSMISSION-SIG'],
                'transmission_time' => $headers['PAYPAL-TRANSMISSION-TIME'],
                'webhook_id'        => $webhookId,
                'webhook_event'     => $payload,
            ]);

        if (!$verificationResponse->ok() || $verificationResponse['verification_status'] !== 'SUCCESS') {
            Log::warning('PayPal Webhook Verification Failed', $verificationResponse->json());
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // ✅ Signature is valid — continue
        Log::info('PayPal Webhook Verified:', $payload);

        if ($payload['event_type'] !== 'PAYMENT.CAPTURE.COMPLETED') {
            return response()->json(['message' => 'Ignored non-capture event']);
        }

        $details = $payload['resource'];
        $payer = $details['payer'];
        $items = $details['purchase_units'][0]['items'] ?? [];

        $resortName = $items[0]['name'] ?? 'Unknown Resort';
        $package = $items[0]['description'] ?? 'No Package Description';

        $name = $payer['name']['given_name'] . ' ' . $payer['name']['surname'];
        $email = $payer['email_address'];
        $phone = $payer['phone']['phone_number']['national_number'] ?? 'Not Provided';
        $state = $payer['address']['admin_area_1'] ?? null;

        $usTime = now()->setTimezone('America/New_York')->format('m/d/Y h:i:s A');
        $certificateExpire = now()->addMonths(6)->format('m/d/Y');
        $invoiceNumber = strtoupper(uniqid('INV-'));

        do {
            $linkId = 'GE-' . strtoupper(Str::random(40));
        } while (PurchaseConfirmation::where('linkID', $linkId)->exists());

        $count = PurchaseConfirmation::count() + 1;
        $prefix = 'GE';
        $number = str_pad($count, 5, '0', STR_PAD_LEFT);
        $firstLetter = chr(ord('A') + (($count - 1) / 26) % 26);
        $secondLetter = chr(ord('A') + ($count - 1) % 26);
        $certNumber = "{$prefix}-{$number}-{$firstLetter}{$secondLetter}";

        PurchaseConfirmation::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'resort_name' => $resortName,
            'package' => $package,
            'transaction_id' => $details['id'],
            'status' => $details['status'],
            'amount' => $details['amount']['value'],
            'us_time' => $usTime,
            'purchased_date' => $usTime,
            'certificate_expire' => $certificateExpire,
            'invoice_number' => $invoiceNumber,
            'card_type' => 'PayPal',
            'card_number' => '************0000',
            'linkID' => $linkId,
            'cert_number' => $certNumber,
        ]);

        $payLink = url('/purchase-confirmation/' . $linkId);
        $adminEmail = 'admin@greenescapestravel.com';

        Mail::to($email)->send(new PurchaseConfirmationMail($payLink));
        Mail::to($adminEmail)->send(new AdminPurchaseConfirmationMail($name, $certNumber, $payLink));

        return response()->json(['message' => 'Webhook verified, processed and saved']);
    }

}
