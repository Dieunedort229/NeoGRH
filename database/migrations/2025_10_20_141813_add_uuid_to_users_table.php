<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Ajouter colonne UUID
            $table->uuid('uuid')->nullable()->after('id');
        });
        
        // Générer des UUIDs pour les utilisateurs existants
        $users = \App\Models\User::all();
        foreach ($users as $user) {
            $user->update(['uuid' => (string) Str::uuid()]);
        }
        
        // Rendre la colonne UUID obligatoire maintenant qu'elle est peuplée
        Schema::table('users', function (Blueprint $table) {
            $table->uuid('uuid')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('uuid');
        });
    }
};
