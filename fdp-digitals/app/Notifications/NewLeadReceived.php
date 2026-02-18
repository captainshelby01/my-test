<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewLeadReceived extends Notification
{
    use Queueable;

    protected $leadData;

    /**
     * Create a new notification instance.
     */
    public function __construct($leadData)
    {
        $this->leadData = $leadData;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Lead: ' . ($this->leadData['service'] ?? 'General Inquiry'))
            ->greeting('Hello FDP Digitals Team!')
            ->line('You have received a new lead from your website.')
            ->line('**Name:** ' . $this->leadData['name'])
            ->line('**Email:** ' . $this->leadData['email'])
            ->line('**Service Interested:** ' . ($this->leadData['service'] ?? 'Not Specified'))
            ->line('**Message:**')
            ->line($this->leadData['message'] ?? 'No message provided.')
            ->action('View Leads in Admin', url('/admin/leads'))
            ->line('Thank you for using FDP Digitals!');
    }
}