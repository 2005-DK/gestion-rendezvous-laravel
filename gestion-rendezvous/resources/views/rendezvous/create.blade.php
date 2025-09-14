{{-- filepath: resources/views/rendezvous/create.blade.php --}}
@extends('layouts.app')
@section('title', 'Nouveau rendez-vous')
@section('content')
<div class="container" style="max-width:600px;">
    <h2>Prendre un rendez-vous</h2>
    <x-alert />
    <form method="POST" action="{{ route('rendezvous.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nom complet</label>
            <input type="text" name="fullname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Téléphone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Ville</label>
            <input type="text" name="ville" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Date souhaitée</label>
            <input type="date" name="date" class="form-control" required>
            
        </div>
        <div class="mb-3">
            <label>Type de rendez-vous</label>
            <select name="type_acte" class="form-control" required>
                <option value="">-- Sélectionner --</option>
                <option value="Vente immobilière">Vente immobilière</option>
                <option value="Mariage">Mariage</option>
                <option value="Donations">Donations</option>
                <option value="Succession">Succession</option>
                <option value="Conseil juridique">Conseil juridique</option>
                <option value="Authentification de documents">Authentification de documents</option>
                <option value="Autre">Autre</option>

            </select>
        </div>
        <x-button>Valider</x-button>
    </form>
</div>
@endsection

