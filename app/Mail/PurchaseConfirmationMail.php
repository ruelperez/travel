<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PurchaseConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $payLink; // Store purchase info
    /**
     * Create a new message instance.
     */
    public function __construct($payLink)
    {
        $this->payLink = $payLink;
    }

    public function build()
    {
        return $this->subject('Purchase Confirmation') // 👈 customized subject
            ->view('emails.purchase-confirmation')
            ->with(['payLink' => $this->payLink]);
    }
    public function attachments(): array
    {
        return [];
    }
}
