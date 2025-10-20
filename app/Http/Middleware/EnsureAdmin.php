<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
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
        
        // Admin peut avoir rôle 'admin' ou 'superadmin'
        if (!$user->hasRole('admin') && !$user->hasRole('superadmin')) {
            abort(403, 'Accès refusé. Droits administrateur requis.');
        }

        return $next($request);
    }
}