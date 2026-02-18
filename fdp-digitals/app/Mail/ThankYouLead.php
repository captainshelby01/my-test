<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ThankYouLead extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $service;

    public function __construct($name, $service)
    {
        $this->name = $name;
        $this->service = $service;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We Received Your Request - FDP Digitals',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.thankyou',
        );
    }
}