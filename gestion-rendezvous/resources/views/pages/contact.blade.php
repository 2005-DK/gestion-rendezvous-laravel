{{-- filepath: resources/views/pages/contact.blade.php --}}
@extends('layouts.app')
@section('title', 'Contact')
@section('content')
<div class="container" style="max-width:500px;">
    <h2>Contactez-nous</h2>
    <form>
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Message</label>
            <textarea class="form-control" rows="4" required></textarea>
        </div>
        <x-button>Envoyer</x-button>
    </form>
</div>
@endsection

