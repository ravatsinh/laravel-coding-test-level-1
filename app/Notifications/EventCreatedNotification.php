<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventCreatedNotification extends Notification
{
    private $event;
    public function __construct($event)
    {
        $this->event=$event;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Event has been created. Id# '.$this->event->id)
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }
}
