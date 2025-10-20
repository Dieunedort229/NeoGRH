<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('user_name'); // Nom au moment de l'action (au cas où user supprimé)
            $table->string('user_email'); // Email au moment de l'action
            $table->string('user_role')->nullable(); // Rôle au moment de l'action
            $table->string('action'); // login, logout, create_user, update_user, delete_user, etc.
            $table->string('model_type')->nullable(); // App\Models\User, App\Models\Role, etc.
            $table->unsignedBigInteger('model_id')->nullable(); // ID du modèle affecté
            $table->string('description'); // Description lisible de l'action
            $table->json('old_values')->nullable(); // Anciennes valeurs (pour updates)
            $table->json('new_values')->nullable(); // Nouvelles valeurs (pour updates)
            $table->string('ip_address', 45)->nullable(); // Adresse IP
            $table->string('user_agent')->nullable(); // Navigateur/User-Agent
            $table->timestamp('performed_at'); // Moment exact de l'action
            $table->timestamps();
            
            // Index pour les recherches rapides
            $table->index(['user_id', 'performed_at']);
            $table->index(['action', 'performed_at']);
            $table->index('performed_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
