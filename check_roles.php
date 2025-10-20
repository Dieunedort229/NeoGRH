<?php

use App\Models\User;
use App\Models\Role;

echo "=== VÉRIFICATION DES RÔLES ===\n\n";

echo "Rôles disponibles :\n";
foreach (Role::all() as $role) {
    echo "- {$role->name} (ID: {$role->id})\n";
}

echo "\nUtilisateurs et leurs rôles :\n";
foreach (User::with('roles')->get() as $user) {
    $roles = $user->roles->pluck('name')->join(', ') ?: 'Aucun rôle';
    echo "- {$user->name} ({$user->email}) : {$roles}\n";
}

echo "\n=== TESTS ===\n";
$superAdmin = User::where('email', 'superadmin@example.com')->first();
if ($superAdmin) {
    echo "SuperAdmin trouve : {$superAdmin->name}\n";
    echo "A le rôle SuperAdmin ? " . ($superAdmin->hasRole('SuperAdmin') ? 'OUI' : 'NON') . "\n";
} else {
    echo "SuperAdmin NON TROUVÉ !\n";
}