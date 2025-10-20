<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureEditor
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        // Éditeur peut avoir rôle 'editeur', 'admin' ou 'superadmin'
        $allowedRoles = ['editeur', 'admin', 'superadmin'];
        $hasRole = false;
        
        foreach ($allowedRoles as $role) {
            if ($user->hasRole($role)) {
                $hasRole = true;
                break;
            }
        }

        if (!$hasRole) {
            abort(403, 'Accès refusé. Droits éditeur requis.');
        }

        return $next($request);
    }
}