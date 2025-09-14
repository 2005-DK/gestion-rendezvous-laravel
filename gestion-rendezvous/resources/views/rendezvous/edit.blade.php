{{-- filepath: resources/views/rendezvous/edit.blade.php --}}
@extends('layouts.app')
@section('title', 'Modifier le rendez-vous')
@section('content')
<div class="ml-64 flex-1 p-8">
    <h1 class="text-2xl font-bold mb-6">Modifier le rendez-vous</h1>
    <form action="{{ route('rendezvous.update', $rendezvous->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Ajoute ici tes champs du formulaire, par exemple : -->
        <div class="mb-4">
            <label class="block mb-1">Nom complet</label>
            <input type="text" name="fullname" value="{{ old('fullname', $rendezvous->fullname) }}" class="w-full border rounded px-3 py-2">
        </div>
        <!-- Ajoute les autres champs... -->
        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded">Enregistrer</button>
    </form>
</div>
@endsection

