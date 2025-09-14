@extends('layouts.app')
@section('title', 'Détail du rendez-vous')
@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-purple-100 to-pink-50 flex items-center justify-center px-6 py-10 relative overflow-hidden">

    <!-- Illustration -->
    <div class="absolute bottom-0 right-0 w-40 opacity-20 pointer-events-none">
        <img src="https://www.svgrepo.com/show/331993/calendar-date.svg" alt="Décoration calendrier">
    </div>

    <!-- Carte principale -->
    <div class="w-full max-w-2xl bg-white shadow-xl rounded-2xl px-8 py-10 relative animate-fade-in">

        <!-- Badge statut -->
        <div class="absolute top-4 right-4 text-sm bg-yellow-400 text-white font-semibold px-3 py-1 rounded-full shadow-md">
            ⏳ En attente
        </div>

        <!-- Titre -->
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-8 flex items-center justify-center gap-2">
            📋 Détail du rendez-vous
        </h2>

        <!-- Infos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-gray-700 text-base">
            <div><span class="font-semibold">👤 Nom complet :</span><br> APETI</div>
            <div><span class="font-semibold">📞 Téléphone :</span><br> 97696970</div>
            <div><span class="font-semibold">🏙️ Ville :</span><br> Lome</div>
            <div><span class="font-semibold">📅 Date :</span><br> 2025-07-01</div>
            <div><span class="font-semibold">📄 Type d'acte :</span><br> Vente immobilière</div>
            <div><span class="font-semibold">🕒 Créé le :</span><br> 01/07/2025 15:20</div>
        </div>

        <!-- Actions -->
        <div class="flex flex-wrap justify-center sm:justify-between gap-4 mt-10">
            <a href="{{ route('rendezvous.index') }}" class="flex items-center gap-2 px-5 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition shadow">
                ← Retour
            </a>

            <a href="{{ route('rendezvous.edit', $rendezvous->id) }}" class="flex items-center gap-2 px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition shadow">
                ✏️ Modifier
            </a>

            <form action="{{ route('rendezvous.destroy', $rendezvous->id) }}" method="POST" onsubmit="return confirm('Supprimer ce rendez-vous ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex items-center gap-2 px-5 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition shadow">
                    🗑️ Supprimer
                </button>
            </form>

            <a href="{{ route('rendezvous.pdf', $rendezvous->id) }}" class="flex items-center gap-2 px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow">
                🖨️ Télécharger PDF
            </a>
        </div>
    </div>
</div>

<!-- Animation douce -->
<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fade-in 0.6s ease-out both;
}
@media print {
    .absolute, .flex a, .flex form, .bg-gradient-to-br {
        display: none !important;
    }
}
</style>
@endsection
