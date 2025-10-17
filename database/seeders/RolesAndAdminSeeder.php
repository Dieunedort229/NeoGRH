<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['SuperAdmin','Admin','Editeur','Moniteur'];

        foreach ($roles as $r) {
            Role::firstOrCreate(['name' => $r]);
        }

        // Create a default super admin if not exists
        $email = env('SEED_SUPERADMIN_EMAIL', 'superadmin@example.com');
        $password = env('SEED_SUPERADMIN_PASSWORD', 'password');

        $admin = User::where('email', $email)->first();
        if (! $admin) {
            $admin = User::create([
                'name' => 'Super Admin',
                'email' => $email,
                'password' => Hash::make($password),
            ]);
        }

        $role = Role::where('name','SuperAdmin')->first();
        if ($role && ! $admin->roles()->where('role_id', $role->id)->exists()) {
            $admin->roles()->attach($role);
        }
    }
}
