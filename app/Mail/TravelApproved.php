<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class TravelApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $travelGrant;
    public $pdfPath;

    /**
     * Create a new message instance.
     */
    public function __construct($travelGrant,$pdfPath)
    {
        $this->travelGrant = $travelGrant;
        $this->pdfPath = $pdfPath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Result of your Travel Grant application',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.travelApproved',
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
