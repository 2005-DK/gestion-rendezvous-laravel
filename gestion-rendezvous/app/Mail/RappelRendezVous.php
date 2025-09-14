<?php

namespace App\Mail;

use App\Models\Rendezvous;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\HtmlString;

class RappelRendezVous extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Le rendez-vous concerné
     *
     * @var \App\Models\Rendezvous
     */
    public $rendezvous;

    /**
     * Indique si le destinataire est le notaire
     *
     * @var bool
     */
    public $pourNotaire;

    /**
     * Date et heure du rendez-vous formatées
     *
     * @var string
     */
    public $dateHeureRdv;

    /**
     * Crée une nouvelle instance de message.
     *
     * @param  \App\Models\Rendezvous  $rendezvous
     * @param  bool  $pourNotaire
     * @return void
     */
    public function __construct(Rendezvous $rendezvous, $pourNotaire = false)
    {
        $this->rendezvous = $rendezvous;
        $this->pourNotaire = $pourNotaire;
        $this->dateHeureRdv = Carbon::parse($rendezvous->date->format('Y-m-d') . ' ' . $rendezvous->heure)
            ->isoFormat('dddd D MMMM YYYY [à] HH[h]mm');
    }

    /**
     * Construit le message.
     *
     * @return $this
     */
    public function build()
    {
        $sujet = $this->getSubject();
        $view = $this->pourNotaire ? 'emails.rappel-notaire' : 'emails.rappel-client';
        
        return $this->subject($sujet)
                   ->view($view)
                   ->with([
                       'rendezvous' => $this->rendezvous,
                       'dateHeureRdv' => $this->dateHeureRdv,
                       'pourNotaire' => $this->pourNotaire,
                   ]);
    }
    
    /**
     * Obtient l'objet de l'email en fonction du destinataire
     *
     * @return string
     */
    protected function getSubject()
    {
        if ($this->pourNotaire) {
            return '🔔 Rendez-vous avec ' . $this->rendezvous->fullname . ' - ' . $this->rendezvous->type_acte;
        }
        
        return '⏰ Rappel de votre rendez-vous du ' . $this->dateHeureRdv;
    }
    
    /**
     * Obtient le nom du destinataire
     *
     * @return string
     */
    protected function getRecipientName()
    {
        if ($this->pourNotaire) {
            return 'Maître ' . ($this->rendezvous->notaire->name ?? '');
        }
        
        return $this->rendezvous->fullname;
    }
}
