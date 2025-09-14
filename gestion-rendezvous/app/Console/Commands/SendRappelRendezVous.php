<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Rendezvous;
use App\Notifications\RappelRendezVous;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;

class SendRappelRendezVous extends Command
{
    protected $signature = 'app:send-rappel-rendez-vous';
    protected $description = 'Envoie un rappel par email pour les rendez-vous prévus dans 24h';

    public function handle()
    {
        // On cherche les rendez-vous prévus dans 24h
        $targetDate = Carbon::now()->addDay()->toDateString();

        $rendezvousList = Rendezvous::where('date', $targetDate)->get();

        if ($rendezvousList->isEmpty()) {
            $this->info("Aucun rendez-vous à rappeler pour le " . $targetDate);
        } else {
            foreach ($rendezvousList as $rdv) {
                if (!empty($rdv->email)) {
                    Notification::route('mail', $rdv->email)
                        ->notify(new RappelRendezVous($rdv));
                    $this->info("Rappel envoyé à {$rdv->fullname} ({$rdv->email})");
                }
            }
        }
    }
}