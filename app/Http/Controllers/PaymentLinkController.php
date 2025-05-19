<?php

namespace App\Http\Controllers;

use App\Mail\AdminPurchaseConfirmationMail;
use App\Mail\PurchaseConfirmationMail;
use App\Models\PurchaseConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PaymentLinkController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->all();

        Log::info('PayPal Webhook Payload:', $payload);

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

        // Generate linkID and certNumber
        do {
            $linkId = 'GE-' . strtoupper(Str::random(40));
        } while (PurchaseConfirmation::where('linkID', $linkId)->exists());

        $count = PurchaseConfirmation::count() + 1;
        $prefix = 'GE';
        $number = str_pad($count, 5, '0', STR_PAD_LEFT);
        $firstLetter = chr(ord('A') + (($count - 1) / 26) % 26);
        $secondLetter = chr(ord('A') + ($count - 1) % 26);
        $certNumber = "{$prefix}-{$number}-{$firstLetter}{$secondLetter}";

        // Create the database record
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

        return response()->json(['message' => 'Webhook processed and saved']);
    }
}
