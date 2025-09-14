<?php

namespace App\Http\Controllers;

use App\Models\Acte;
use App\Models\Rendezvous;
use Illuminate\Http\Request;

class ActeController extends Controller
{
    // Affiche le formulaire de création d'un acte pour un rendez-vous donné
    public function create(Request $request)
    {
        $rendezvous = Rendezvous::findOrFail($request->get('rendezvous_id'));
        return view('actes.create', compact('rendezvous'));
    }

    // Enregistre un nouvel acte
    public function store(Request $request)
    {
        $request->validate([
            'rendezvous_id' => 'required|exists:rendezvous,id',
            'type' => 'required|string|max:255',
            'contenu' => 'nullable|string',
        ]);

        Acte::create($request->all());
        return redirect()->route('dashboard')->with('success', 'Acte ajouté avec succès.');
    }

    // Affiche le détail d'un acte
    public function show(Acte $acte)
    {
        return view('actes.show', compact('acte'));
    }
}
