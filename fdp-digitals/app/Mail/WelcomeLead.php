<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeLead extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $service;

    public function __construct($name, $service)
    {
        $this->name = $name;
        $this->service = $service;
    }

    public function build()
    {
        return $this->subject('We received your inquiry - FDP Digitals')
                    ->view('emails.welcome');
    }
}