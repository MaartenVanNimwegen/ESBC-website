<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SignupMail extends Mailable
{
    use Queueable, SerializesModels;
    public $signupModel;

    /**
     * Create a new message instance.
     */
    public function __construct($signupModel)
    {
        $this->signupModel = $signupModel;
    }

    public function build()
    {
        return $this->from('noreply@esbc-menhir.nl', 'noreply')
            ->view('emails.signupMail')
            ->attach(storage_path('app/public/' . $this->signupModel->pasfoto), [
                'as' => 'pasfoto.jpg',
            ]);
        ;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Er is een nieuwe inschrijving! - ESBC Menhir',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails/signupMail',
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
