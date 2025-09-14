<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProfessionalEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $date;
    public $time;
    public $type_acte;

    public function __construct($name, $date, $time, $type_acte)
    {
        $this->name = $name;
        $this->date = $date;
        $this->time = $time;
        $this->type_acte = $type_acte;
    }

    public function build()
    {
        return $this->subject('Confirmation de votre rendez-vous')
                    ->view('emails.rendezvous_confirmation')
                    ->with([
                        'name' => $this->name,
                        'date' => $this->date,
                        'time' => $this->time,
                        'type_acte' => $this->type_acte,
                    ]);
    }
}
