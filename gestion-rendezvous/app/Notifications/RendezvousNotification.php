<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class RendezvousNotification extends Notification
{
    use Queueable;

    protected $rendezvous;

    public function __construct($rendezvous)
    {
        $this->rendezvous = $rendezvous;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Confirmation de votre rendez-vous')
            ->markdown('emails.rendezvous', [
                'rendezvous' => $this->rendezvous,
            ]);
    }
}
