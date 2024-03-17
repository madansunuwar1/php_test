<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerificationStatus extends Mailable
{
    use Queueable, SerializesModels;
    public $status;
    public $password;
    public $email;
    
    public function __construct($status,  $password = null, $email = null)
    {
        $this->status = $status;
        $this->password = $password;
        $this->email = $email;
    }   

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verification Status',
        );
    }
    public function build()
    {
        return $this
            ->subject('Verification Status Update')
            ->view('emails.verification-status');
    }
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.verification-status',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
