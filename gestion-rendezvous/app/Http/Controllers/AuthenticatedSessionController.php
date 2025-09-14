<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validation des données
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Tentative d’authentification
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // 3. Redirection selon rôle
            $role = Auth::user()->role;

            return match ($role) {
                'notaire' => redirect()->intended('/notaire/dashboard'),
                'secretaire' => redirect()->intended('/secretaire/dashboard'),
                'client' => redirect()->intended('/accueil-client'),
                default => back()->withErrors(['email' => 'Rôle utilisateur non autorisé.']),
            };
        }

        // 4. Échec de l’authentification
        return back()->withErrors([
            'email' => 'Identifiants invalides.',
        ])->onlyInput('email');
    }
}
