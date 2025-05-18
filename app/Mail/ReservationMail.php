<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

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
        return $this->view('emails.purchase-confirmation-email')
            ->with(['confirmation' => $this->confirmation]);
    }
    public function attachments(): array
    {
        return [];
    }
}
