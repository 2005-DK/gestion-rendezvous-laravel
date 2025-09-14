{{-- filepath: resources/views/rendezvous/index.blade.php --}}
@extends('layouts.app')
@section('title', 'Tableau de bord')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
<div class="flex min-h-screen bg-gray-100">
  <!-- Sidebar -->
  <aside class="w-64 bg-white shadow-md">
    <div class="p-6 font-bold text-blue-700 text-2xl">Notariat</div>
    <nav class="mt-8">
      <a href="{{ route('dashboard') }}" class="block py-3 px-6 text-gray-700 hover:bg-blue-100">Dashboard</a>
      <a href="{{ route('rendezvous.index') }}" class="block py-3 px-6 text-gray-700 hover:bg-blue-100">Rendez-vous</a>
      <a href="{{ route('rendezvous.create') }}" class="block py-3 px-6 text-gray-700 hover:bg-blue-100">Nouveau rendez-vous</a>
      <a href="{{ url('/pages/services') }}" class="block py-3 px-6 text-gray-700 hover:bg-blue-100">Services</a>
      <a href="{{ url('/pages/contact') }}" class="block py-3 px-6 text-gray-700 hover:bg-blue-100">Contact</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col">
    <!-- Top Navbar -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-blue-700">Tableau de bord</h1>
      <div class="flex items-center gap-4">
        <input type="text" placeholder="Recherche..." class="px-4 py-2 border rounded-lg">
        <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold">
          {{ strtoupper(substr(Auth::user()->name ?? 'ND', 0, 2)) }}
        </div>
      </div>
    </header>

    <!-- Content -->
    <main class="p-6 space-y-6">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
          <p class="text-sm text-gray-500">Total Rendez-vous</p>
          <h2 class="text-3xl font-bold text-blue-700 mt-2">{{ $totalRdv ?? '...' }}</h2>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
          <p class="text-sm text-gray-500">Services</p>
          <h2 class="text-3xl font-bold text-orange-600 mt-2">6</h2>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
          <p class="text-sm text-gray-500">Nouveaux messages</p>
          <h2 class="text-3xl font-bold text-green-600 mt-2">0</h2>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
          <p class="text-sm text-gray-500">Utilisateurs</p>
          <h2 class="text-3xl font-bold text-purple-700 mt-2">1</h2>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-md">
        <div class="p-4 border-b font-bold text-blue-700">Derniers rendez-vous</div>
        <table class="w-full text-left">
          <thead class="bg-blue-50">
            <tr>
              <th class="p-4">Nom</th>
              <th class="p-4">Téléphone</th>
              <th class="p-4">Date</th>
              <th class="p-4">Type</th>
              <th class="p-4">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($rendezvous ?? [] as $rdv)
              <tr class="border-t">
                <td class="p-4">{{ $rdv->fullname }}</td>
                <td class="p-4">{{ $rdv->phone }}</td>
                <td class="p-4">{{ $rdv->date }}</td>
                <td class="p-4">{{ $rdv->type_acte }}</td>
                <td class="p-4">
                  <a href="{{ route('rendezvous.show', $rdv->id) }}" class="text-blue-600 hover:underline">Voir</a>
                  <a href="{{ route('rendezvous.edit', $rdv->id) }}" class="text-yellow-600 hover:underline ml-2">Modifier</a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="p-4 text-center text-gray-400">Aucun rendez-vous récent.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <footer class="bg-white p-4 mt-10 text-center text-sm text-gray-400 border-t">
        © 2025 Plateforme Notariale. Tous droits réservés.
      </footer>
    </main>
  </div>
</div>
@endsection

