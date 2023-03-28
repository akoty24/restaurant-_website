<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookTable extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Book Table',
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'emails.BookTable',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
