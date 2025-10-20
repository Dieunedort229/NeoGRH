<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Role;

class CheckRoles extends Command
{
    protected $signature = 'check:roles';
    protected $description = 'Vérifier les rôles et utilisateurs';

    public function handle()
    {
        $this->info('=== VÉRIFICATION DES RÔLES ===');
        $this->newLine();

        $this->info('Rôles disponibles :');
        foreach (Role::all() as $role) {
            $this->line("- {$role->name} (ID: {$role->id})");
        }

        $this->newLine();
        $this->info('Utilisateurs et leurs rôles :');
        foreach (User::with('roles')->get() as $user) {
            $roles = $user->roles->pluck('name')->join(', ') ?: 'Aucun rôle';
            $this->line("- {$user->name} ({$user->email}) : {$roles}");
        }

        $this->newLine();
        $this->info('=== TESTS ===');
        $superAdmin = User::where('email', 'superadmin@example.com')->first();
        if ($superAdmin) {
            $this->info("SuperAdmin trouvé : {$superAdmin->name}");
            $hasRole = $superAdmin->hasRole('SuperAdmin') ? 'OUI' : 'NON';
            $this->info("A le rôle SuperAdmin ? {$hasRole}");
        } else {
            $this->error("SuperAdmin NON TROUVÉ !");
        }

        return 0;
    }
}