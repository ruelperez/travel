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
    public function handle(Request $request)
    {
        $payload = $request->all();
        Log::info('PayPal Webhook Received', $payload);

        // Only proceed if it's a completed payment
        if ($payload['event_type'] === 'PAYMENT.CAPTURE.COMPLETED') {
            $email = $payload['resource']['payer']['email_address'] ?? null;

            if ($email) {
                // Optional: Store payment in DB if needed
                $payLink = "https://www.facebook.com/";
                // Send email
                Mail::to($email)->send(new PurchaseConfirmationMail($payLink));
            }
        }

        return response()->json(['status' => 'ok']);
    }
}
