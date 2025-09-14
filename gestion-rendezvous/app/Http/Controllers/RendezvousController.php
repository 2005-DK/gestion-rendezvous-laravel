<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Notifications\RendezvousCreated;
use Exception;

class RendezvousController extends Controller
{
    // Liste des rendez-vous
    public function index()
    {
        $rendezvous = Rendezvous::orderBy('date', 'desc')->get();
        return view('rendezvous.index', compact('rendezvous'));
    }

    // Affichage d'un rendez-vous
    public function show(Rendezvous $rendezvous)
    {
        return view('rendezvous.show', compact('rendezvous'));
    }

    // Formulaire d'édition
    public function edit(Rendezvous $rendezvous)
    {
        $notaires = User::where('role', 'notaire')->get();
        return view('rendezvous.edit', compact('rendezvous', 'notaires'));
    }

    // Mise à jour d'un rendez-vous
    public function update(Request $request, Rendezvous $rendezvous)
    {
        $request->merge(['urgence' => $request->has('urgence')]);

        $validated = $request->validate([
            'fullname'   => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|string|max:30',
            'ville'      => 'required|string|max:100',
            'date'       => 'required|date|after_or_equal:today',
            'heure'      => 'required',
            'type_acte'  => 'required|string|max:100',
            'urgence'    => 'sometimes|boolean',
            'notaire_id' => 'nullable|exists:users,id',
        ]);

        try {
            $rendezvous->update($validated);
            return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous mis à jour avec succès.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    // Suppression d'un rendez-vous
    public function destroy(Rendezvous $rendezvous)
    {
        try {
            $rendezvous->delete();
            return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous supprimé avec succès.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // Enregistrement d'un rendez-vous
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'ville' => 'required|string|max:255',
            'date' => 'required|date',
            'heure' => 'required',
            'type_acte' => 'required|string|max:255',
        ]);

        Rendezvous::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'ville' => $request->ville,
            'date' => $request->date,
            'heure' => $request->heure,
            'type_acte' => $request->type_acte,
        ]);

        return redirect()->route('dashboard')->with('success', 'Votre demande de rendez-vous a bien été enregistrée.');
    }

    // Génération PDF d'un rendez-vous
    public function generatePdf($id)
    {
        $rendezvous = Rendezvous::findOrFail($id);
        $pdf = Pdf::loadView('rendezvous.pdf', compact('rendezvous'));
        return $pdf->download('rendezvous-' . $rendezvous->id . '.pdf');
    }
}
