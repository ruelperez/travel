<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminPurchaseConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $customerName;
    public $certNumber;
    public $payLink; // Store purchase info
    /**
     * Create a new message instance.
     */
    public function __construct($customerName, $certNumber, $payLink)
    {
        $this->customerName = $customerName;
        $this->certNumber = $certNumber;
        $this->payLink = $payLink;
    }

    public function build()
    {
        return $this->subject('Purchase Confirmation - '.$this->customerName. ' ('.$this->certNumber.')') // 👈 customized subject
        ->view('emails.purchase-confirmation')
            ->with(['payLink' => $this->payLink]);
    }
    public function attachments(): array
    {
        return [];
    }
}
