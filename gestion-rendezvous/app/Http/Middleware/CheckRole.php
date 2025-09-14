<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();
        
        // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
        if (!$user) {
            return redirect()->route('login');
        }
        
        // Si aucun rôle n'est spécifié, on laisse passer
        if (empty($roles)) {
            return $next($request);
        }
        
        // Vérifier si l'utilisateur a l'un des rôles requis
        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }
        
        // Si l'utilisateur n'a aucun des rôles requis
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Accès non autorisé.'], 403);
        }
        
        // Redirection en fonction du rôle de l'utilisateur
        if ($user->isAdmin()) {
            return redirect()->route('dashboard');
        } elseif ($user->isNotaire()) {
            return redirect()->route('notaire.dashboard');
        } elseif ($user->isSecretaire()) {
            return redirect()->route('secretaire.dashboard');
        } elseif ($user->isClient()) {
            return redirect()->route('client.dashboard');
        }
        
        // Par défaut, rediriger vers la page d'accueil
        return redirect('/');
    }
}
