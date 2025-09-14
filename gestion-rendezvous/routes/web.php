<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RendezvousController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\NotaireDashboardController;
use App\Http\Controllers\SecretaireDashboardController;

Route::middleware(['web'])->group(function () {

    // 🏠 Page d'accueil
    Route::get('/', function () {
        return view('welcome');
    });

    // 🔐 Authentification personnalisée
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store']);

    // 🔁 Réinitialisation de mot de passe
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'update'])->name('password.update');

    // 🔒 Routes protégées (authentifiés & vérifiés)
    Route::middleware(['auth', 'verified'])->group(function () {

        // 📊 Tableau de bord général
        Route::get('/dashboard', function () {
            $totalRdv = \App\Models\Rendezvous::count();
            $rendezvous = \App\Models\Rendezvous::orderBy('date', 'desc')->take(5)->get();
            return view('dashboard.index', compact('totalRdv', 'rendezvous'));
        })->name('dashboard');

        // 📅 Gestion des rendez-vous
        Route::get('/rendezvous', [RendezvousController::class, 'index'])->name('rendezvous.index');
        Route::get('/rendezvous/create', function () {
            return view('rendezvous.create');
        })->name('rendezvous.create');
        Route::post('/rendezvous', [RendezvousController::class, 'store'])->name('rendezvous.store');
        Route::get('/rendezvous/{rendezvous}', [RendezvousController::class, 'show'])->name('rendezvous.show');
        Route::get('/rendezvous/{rendezvous}/edit', [RendezvousController::class, 'edit'])->name('rendezvous.edit');
        Route::put('/rendezvous/{rendezvous}', [RendezvousController::class, 'update'])->name('rendezvous.update');
        Route::delete('/rendezvous/{rendezvous}', [RendezvousController::class, 'destroy'])->name('rendezvous.destroy');

        // 👤 Profil utilisateur
        Route::get('/profile', function () {
            return view('profile.show');
        })->name('profile.show');

        // 📄 Génération de PDF (protégée)
        Route::get('/rendezvous/{id}/pdf', [RendezvousController::class, 'generatePdf'])->name('rendezvous.pdf');

        // 🧑‍⚖️ Tableaux de bord selon rôle
        Route::middleware(['role:notaire'])->group(function () {
            Route::get('/notaire/dashboard', [NotaireDashboardController::class, 'index'])->name('notaire.dashboard');
        });
        
        // Routes pour la secrétaire
        Route::middleware(['role:secretaire'])->group(function () {
            Route::get('/secretaire/dashboard', [SecretaireDashboardController::class, 'index'])->name('secretaire.dashboard');
            Route::post('/secretaire/rendezvous/{rendezvous}/assigner', [SecretaireDashboardController::class, 'assignerNotaire'])->name('secretaire.assigner');
            Route::patch('/secretaire/rendezvous/{rendezvous}/statut', [SecretaireDashboardController::class, 'updateStatut'])->name('secretaire.update-statut');
        });
    });
});

// 🛑 Fallback pour pages 404
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

Route::resource('actes', App\Http\Controllers\ActeController::class)->only(['create', 'store', 'show']);
