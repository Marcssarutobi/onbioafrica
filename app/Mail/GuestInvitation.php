<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class GuestInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $guest;
    public $pdfPath;

    /**
     * Create a new message instance.
     */
    public function __construct($guest, $pdfPath)
    {
        $this->guest = $guest;
        $this->pdfPath = $pdfPath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Official letter of Invitation – OneBioAfrica 2026 Symposium',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.guest_invitation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->pdfPath)
            ->as('Official_Invitation_OneBioAfrica_2026.pdf')
            ->withMime('application/pdf'),
        ];
    }
}
