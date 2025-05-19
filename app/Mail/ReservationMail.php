<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class ReservationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $confirmation; // Store purchase info
    /**
     * Create a new message instance.
     */
    public function __construct($confirmation)
    {
        $this->confirmation = $confirmation;
    }

    public function build()
    {
        return $this->subject('Purchase Confirmation Letter - ' . Str::title($this->confirmation->name) . ' - (' . $this->confirmation->cert_number.')')
            ->view('emails.purchase-confirmation-email')
            ->with(['confirmation' => $this->confirmation]);
    }
    public function attachments(): array
    {
        return [];
    }
}
