<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class RappelRendezVous extends Notification
{
    use Queueable;

    public $rendezvous;

    /**
     * Create a new notification instance.
     */
    public function __construct($rendezvous)
    {
        $this->rendezvous = $rendezvous;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('⏰ Rappel de votre rendez-vous notarial')
            ->greeting('Bonjour ' . ($notifiable->fullname ?? $notifiable->name ?? ''))
            ->line('Ceci est un rappel : vous avez un rendez-vous prévu dans 24 heures.')
            ->line('🗓 Date : ' . $this->rendezvous->date)
            ->line('🕒 Heure : ' . $this->rendezvous->heure)
            ->line('📄 Type : ' . $this->rendezvous->type_acte)
            ->line('Merci d’être ponctuel.')
            ->salutation('L’équipe de l’étude notariale');
    }
}
