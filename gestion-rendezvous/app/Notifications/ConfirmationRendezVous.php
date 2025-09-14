<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ConfirmationRendezVous extends Notification
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
            ->subject('Confirmation de votre rendez-vous')
            ->greeting('Bonjour ' . ($notifiable->fullname ?? $notifiable->name ?? ''))
            ->line('Votre rendez-vous est confirmé avec le notaire.')
            ->line('Date : ' . $this->rendezvous->date)
            //->line('Heure : ' . $this->rendezvous->heure) // décommente si tu as ce champ
            ->line('Type : ' . $this->rendezvous->type_acte)
            ->line('Merci de vous présenter à l’heure.')
            ->salutation('Cordialement, l’étude notariale.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
