<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureSuperAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (! $user) {
            abort(403, 'Accès non autorisé. Veuillez vous connecter.');
        }

        // Utiliser l'ID du rôle SuperAdmin depuis la configuration
        $superAdminRoleId = config('auth.superadmin_role_id', 1);
        $isSuper = $user->roles()->where('roles.id', $superAdminRoleId)->exists();

        if (! $isSuper) {
            abort(403, 'Accès refusé. Droits SuperAdmin requis.');
        }

        return $next($request);
    }
}
