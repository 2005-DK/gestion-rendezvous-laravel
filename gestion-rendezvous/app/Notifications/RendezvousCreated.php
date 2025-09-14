<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class RendezvousCreated extends Notification
{
    use Queueable;

    public $rendezvous;

    public function __construct($rendezvous)
    {
        $this->rendezvous = $rendezvous;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Confirmation de votre rendez-vous')
            ->greeting('Bonjour ' . ($this->rendezvous->fullname ?? ''))
            ->line('Votre rendez-vous a bien été enregistré.')
            ->line('Date : ' . $this->rendezvous->date)
            ->line('Heure : ' . $this->rendezvous->heure)
            ->line('Type : ' . $this->rendezvous->type_acte)
            ->line('Merci d\'utiliser notre plateforme !');
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}
