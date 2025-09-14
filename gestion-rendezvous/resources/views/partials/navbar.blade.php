{{-- filepath: resources/views/partials/navbar.blade.php --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Plateforme Notariale</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rendezvous.index') }}">Rendez-vous</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/pages/services') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/pages/contact') }}">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
            </ul>
        </div>
    </div>
</nav>

