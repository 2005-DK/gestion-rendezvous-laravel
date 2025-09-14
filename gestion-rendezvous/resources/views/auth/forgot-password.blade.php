{{-- filepath: resources/views/auth/forgot-password.blade.php --}}
@extends('layouts.app')
@section('title', 'Mot de passe oublié')
@section('content')
<div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4">Mot de passe oublié</h1>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Adresse e-mail</label>
                <input type="email" name="email" id="email" required class="mt-1 w-full border-gray-300 rounded px-3 py-2" />
            </div>
            <button type="submit" class="bg-cyan-500 text-white px-4 py-2 rounded w-full">Envoyer le lien</button>
        </form>
    </div>
</div>
@endsection