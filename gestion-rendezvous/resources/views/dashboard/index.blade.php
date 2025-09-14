@extends('layouts.app')
@section('title', 'Tableau de bord')
@section('content')
@if(session('success'))
  <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
@endif
@if(session('error'))
  <div class="bg-red-100 text-red-800 p-3 rounded mb-4">{{ session('error') }}</div>
@endif
<div class="flex min-h-screen bg-gray-100"></div>
  <!-- Sidebar -->
  <aside class="w-64 bg-white shadow-md">
    <div class="p-6 font-bold text-blue-700 text-2xl">Notariat</div>
    <nav class="mt-8">
      <a href="{{ route('rendezvous.index') }}" class="block py-3 px-6 text-gray-700 hover:bg-blue-100">Rendez-vous</a>
      <a href="{{ route('rendezvous.create') }}" class="block py-3 px-6 text-gray-700 hover:bg-blue-100">Nouveau rendez-vous</a>
      <a href="{{ url('/pages/services') }}" class="block py-3 px-6 text-gray-700 hover:bg-blue-100">Services</a>
      <a href="{{ url('/pages/contact') }}" class="block py-3 px-6 text-gray-700 hover:bg-blue-100">Contact</a>
    </nav>
  </aside>
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
    <main class="p-6 space-y-6">
      <!-- Statistiques -->
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

      <!-- Recherche et filtres -->
<form method="GET" action="{{ route('dashboard') }}" class="mb-4 flex flex-wrap gap-2 items-center">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nom, email, téléphone..." class="px-3 py-2 border rounded-lg">
    <select name="type_acte" class="px-3 py-2 border rounded-lg">
        <option value="">Tous types</option>
        <option value="Vente" {{ request('type_acte') == 'Vente' ? 'selected' : '' }}>Vente</option>
        <option value="Mariage" {{ request('type_acte') == 'Mariage' ? 'selected' : '' }}>Mariage</option>
        <!-- Ajoute d'autres types ici -->
    </select>
    <input type="date" name="date" value="{{ request('date') }}" class="px-3 py-2 border rounded-lg">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Filtrer</button>
</form>

      <!-- Derniers rendez-vous -->
      <div class="bg-white rounded-lg shadow-md">
        <div class="p-4 border-b font-bold text-blue-700">Derniers rendez-vous</div>
        <table class="w-full text-left">
          <thead class="bg-blue-50">
            <tr>
              <th class="p-4">Nom</th>
              <th class="p-4">Téléphone</th>
              <th class="p-4">Email</th>
              <th class="p-4">Date</th>
              <th class="p-4">Heure</th>
              <th class="p-4">Type</th>
              
              <th class="p-4">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($rendezvous ?? [] as $rdv)
              <tr class="border-t">
                <td class="p-4">{{ $rdv->fullname ?? '-' }}</td>
                <td class="p-4">{{ $rdv->phone ?? '-' }}</td>
                <td class="p-4">{{ $rdv->email ?? '-' }}</td>
                <td class="p-4">
                  {{ $rdv->date ? \Carbon\Carbon::parse($rdv->date)->format('Y-m-d') : '-' }}
                </td>
                <td class="p-4">
                  {{ $rdv->heure ? \Carbon\Carbon::parse($rdv->heure)->format('H:i') : '-' }}
                </td>
                <td class="p-4">{{ $rdv->type_acte ?? '-' }}</td>
                <td class="p-4 flex gap-2">
                  <a href="{{ route('rendezvous.show', $rdv->id) }}" class="text-blue-600 hover:underline">Voir</a>
                  <a href="{{ route('rendezvous.edit', $rdv->id) }}" class="text-yellow-600 hover:underline ml-2">Modifier</a>
                  <form action="{{ route('rendezvous.destroy', $rdv->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Confirmer la suppression ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline ml-2">Supprimer</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="p-4 text-center text-gray-400">Aucun rendez-vous récent.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

  <!-- Boutons -->
      <div class="bg-white p-6 rounded-lg shadow-md grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="{{ route('rendezvous.create') }}" class="bg-blue-600 text-white py-3 rounded-lg shadow hover:bg-blue-700 text-center">Nouveau rendez-vous</a>
        <a href="{{ route('rendezvous.index') }}" class="bg-green-600 text-white py-3 rounded-lg shadow hover:bg-green-700 text-center">Tous les rendez-vous</a>
        <a href="{{ url('/pages/services') }}" class="bg-orange-600 text-white py-3 rounded-lg shadow hover:bg-orange-700 text-center">Services</a>
        <a href="{{ url('/pages/contact') }}" class="bg-purple-600 text-white py-3 rounded-lg shadow hover:bg-purple-700 text-center">Contact</a>
      </div>

      <!-- Rapport des Rendez-vous -->
      <div class="bg-white p-6 rounded-2xl shadow-lg max-w-4xl w-full mx-auto mt-10">
        <div class="flex justify-between items-center mb-4">
          <h1 class="text-xl font-semibold text-gray-800">Rapport des Rendez-vous</h1>
          <div class="flex items-center space-x-2">
              <span class="text-sm text-gray-600">01 - 07 juillet 2025</span>
              <button class="bg-blue-500 text-white px-2 py-1 rounded-lg hover:bg-blue-600">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 9.5L12 14l-4.5-4.5" />
                  </svg>
              </button>
          </div>
        </div>
        <canvas id="orderReportChart" class="w-full h-80"></canvas>
      </div>

      <!-- Footer -->
      <footer class="bg-white p-4 mt-10 text-center text-sm text-gray-400 border-t">
        © 2025 Plateforme Notariale. Tous droits réservés.
      </footer>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('orderReportChart').getContext('2d');

  const data = {
    labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
    datasets: [
      {
        label: 'Confirmés',
        data: [5, 8, 4, 6, 3, 2, 7],
        type: 'bar',
        backgroundColor: '#22c55e',
        borderRadius: 5,
      },
      {
        label: 'Annulés',
        data: [2, 1, 0, 3, 2, 1, 1],
        type: ' line',
        borderColor: '#ef4444',
        borderColor: '#f43f5e',
        backgroundColor: 'rgba(244,63,94,0.1)',
        borderWidth: 2,
        pointBackgroundColor: '#f43f5e',
        tension: 0.4,
      },
      {
        label: 'Reportés',
        data: [1, 0, 2, 1, 0, 1, 2],
        type: 'line',
        borderColor: '#f97316',
        backgroundColor: 'rgba(251,191,36,0.1)',
        borderWidth: 2,
        pointBackgroundColor: '#f97316',
        tension: 0.4,
      }
    ]
  };

  const config = {
    type: 'bar',
    data,
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
      },
      scales: {
        x: { grid: { display: false } },
        y: { beginAtZero: true }
      }
    }
  };

  new Chart(ctx, config);
</script>
@endsection
