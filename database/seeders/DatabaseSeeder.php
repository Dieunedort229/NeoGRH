<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Seed roles and default admin
        $this->call(\Database\Seeders\RolesAndAdminSeeder::class);

        // Appel des seeders pour les données de test
        $this->call([
            PersonnelSeeder::class,
            ProjetSeeder::class,
            PartenaireSeeder::class,
            PrestataireSeeder::class,
            BanqueSeeder::class,
        ]);

        // Example test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
