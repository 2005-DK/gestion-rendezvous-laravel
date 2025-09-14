{{-- filepath: resources/views/profile/show.blade.php --}}
@extends('layouts.app')
@section('title', 'Mon profil')
@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6">Mon profil</h1>
        <div class="mb-4">
            <span class="font-semibold">Nom :</span> {{ Auth::user()->name }}
        </div>
        <div class="mb-4">
            <span class="font-semibold">Email :</span> {{ Auth::user()->email }}
        </div>
        <div class="mt-6">
            <a href="{{ route('dashboard') }}" class="text-cyan-600 hover:underline">Retour au tableau de bord</a>
        </div>
    </div>
</div>
@endsection