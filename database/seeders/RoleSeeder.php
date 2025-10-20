<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'superadmin',
                'description' => 'Super administrateur invisible avec tous les droits y compris les logs'
            ],
            [
                'name' => 'admin', 
                'description' => 'Administrateur avec tous les droits sauf accès aux logs'
            ],
            [
                'name' => 'editeur',
                'description' => 'Éditeur qui peut créer des moniteurs et modifier certaines données'
            ],
            [
                'name' => 'moniteur',
                'description' => 'Moniteur avec accès aux interfaces basiques (congés, réclamations)'
            ]
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['name' => $role['name']],
                ['description' => $role['description']]
            );
        }
    }
}