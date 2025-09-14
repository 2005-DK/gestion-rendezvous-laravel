<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotaireDashboardController extends Controller
{
    public function index()
    {
        $notaireId = Auth::id();
        
        // Récupérer les rendez-vous du notaire connecté
        $rendezvous = Rendezvous::where('notaire_id', $notaireId)
            ->orderBy('date', 'asc')
            ->orderBy('heure', 'asc')
            ->get();
            
        // Statistiques
        $totalRdv = $rendezvous->count();
        $rdvAujourdhui = $rendezvous->where('date', now()->toDateString())->count();
        $rdvSemaine = $rendezvous->whereBetween('date', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])->count();
        
        return view('notaire.dashboard', compact(
            'rendezvous',
            'totalRdv',
            'rdvAujourdhui',
            'rdvSemaine'
        ));
    }
}
