@extends('layouts.app')

@section('title', 'Tableau de bord - Notaire')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-blue-800">Tableau de bord - Notaire</h1>
        <div class="text-sm text-gray-500">
            {{ now()->format('l j F Y') }}
        </div>
    </div>

    <!-- Cartes de statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500">Aujourd'hui</p>
                    <p class="text-2xl font-bold">{{ $rdvAujourdhui }}</p>
                    <p class="text-sm text-gray-500">Rendez-vous</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500">Cette semaine</p>
                    <p class="text-2xl font-bold">{{ $rdvSemaine }}</p>
                    <p class="text-sm text-gray-500">Rendez-vous</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500">Prochain RDV</p>
                    @if($rendezvous->count() > 0)
                        <p class="text-xl font-bold">{{ $rendezvous->first()->formatted_date_time }}</p>
                        <p class="text-sm text-gray-500">{{ $rendezvous->first()->fullname }}</p>
                    @else
                        <p class="text-xl font-bold">Aucun RDV</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des rendez-vous -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Mes prochains rendez-vous</h2>
        </div>
        
        @if($rendezvous->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Heure</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type d'acte</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($rendezvous as $rdv)
                            <tr class="{{ $rdv->isLate() ? 'bg-red-50' : '' }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $rdv->date->format('d/m/Y') }}</div>
                                    <div class="text-sm text-gray-500">{{ $rdv->heure }}</div>
                                    @if($rdv->isLate())
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            En retard
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $rdv->fullname }}</div>
                                    <div class="text-sm text-gray-500">{{ $rdv->phone }}</div>
                                    <div class="text-sm text-gray-500">{{ $rdv->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $rdv->type_acte }}</div>
                                    @if($rdv->urgence)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Urgent
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $statusClasses = [
                                            'en_attente' => 'bg-yellow-100 text-yellow-800',
                                            'confirmé' => 'bg-green-100 text-green-800',
                                            'annulé' => 'bg-red-100 text-red-800',
                                            'reporté' => 'bg-blue-100 text-blue-800',
                                        ];
                                        $statusText = [
                                            'en_attente' => 'En attente',
                                            'confirmé' => 'Confirmé',
                                            'annulé' => 'Annulé',
                                            'reporté' => 'Reporté',
                                        ];
                                    @endphp
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClasses[$rdv->statut] ?? 'bg-gray-100 text-gray-800' }}">
                                        {{ $statusText[$rdv->statut] ?? $rdv->statut }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('rendezvous.show', $rdv->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Voir</a>
                                    <a href="{{ route('rendezvous.edit', $rdv->id) }}" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="px-6 py-12 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun rendez-vous à venir</h3>
                <p class="mt-1 text-sm text-gray-500">Vous n'avez aucun rendez-vous programmé pour le moment.</p>
            </div>
        @endif
    </div>
</div>
@endsection
