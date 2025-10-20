<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:superadmin 
                            {--email= : Email du SuperAdmin}
                            {--password= : Mot de passe du SuperAdmin}
                            {--name= : Nom du SuperAdmin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Créer un SuperAdmin invisible pour NeoGRH';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔐 Création du SuperAdmin NeoGRH');
        $this->info('⚠️  Attention : Le SuperAdmin sera invisible dans l\'application');
        
        // Vérifier si un SuperAdmin existe déjà
        $superAdminRole = Role::where('name', 'superadmin')->first();
        if (!$superAdminRole) {
            $this->error('❌ Le rôle SuperAdmin n\'existe pas. Exécutez d\'abord: php artisan db:seed --class=RoleSeeder');
            return 1;
        }

        $existingSuperAdmin = User::whereHas('roles', function($query) {
            $query->where('name', 'superadmin');
        })->first();

        if ($existingSuperAdmin && !$this->confirm('⚠️  Un SuperAdmin existe déjà. Voulez-vous en créer un autre ?')) {
            $this->info('✨ Opération annulée.');
            return 0;
        }

        // Collecter les informations
        $name = $this->option('name') ?: $this->ask('📝 Nom complet du SuperAdmin');
        $email = $this->option('email') ?: $this->ask('📧 Email du SuperAdmin');
        $password = $this->option('password') ?: $this->secret('🔑 Mot de passe sécurisé');

        // Validation
        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ], [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error("❌ $error");
            }
            return 1;
        }

        // Créer l'utilisateur
        try {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'email_verified_at' => now(),
                // optionnels pour SuperAdmin
                'matricule' => 'SA-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT),
                'fonction' => 'Super Administrateur',
                'department' => 'Direction',
                'hire_date' => now(),
                'contract_type' => 'CDI',
            ]);

            // Attacher le rôle SuperAdmin
            $user->roles()->attach($superAdminRole->id);

            $this->info('✅ SuperAdmin créé avec succès !');
            $this->info("👤 Nom: $name");
            $this->info("📧 Email: $email");
            $this->info("🆔 Matricule: {$user->matricule}");
            $this->newLine();
            $this->warn('🔒 IMPORTANT: Ce SuperAdmin est maintenant invisible dans l\'interface.');
            $this->warn('📋 Conservez ces informations de connexion en lieu sûr.');
            
            return 0;
        } catch (\Exception $e) {
            $this->error("❌ Erreur lors de la création: {$e->getMessage()}");
            return 1;
        }
    }
}
