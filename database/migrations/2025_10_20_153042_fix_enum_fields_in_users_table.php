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
        Schema::table('users', function (Blueprint $table) {
            // Modifier gender pour accepter plus de valeurs
            $table->enum('gender', ['M', 'F', 'Homme', 'Femme', 'Masculin', 'Féminin'])->nullable()->change();
            
            // Modifier department pour accepter plus de valeurs et texte libre
            $table->string('department', 100)->nullable()->change();
            
            // Modifier contract_type pour accepter plus de valeurs
            $table->enum('contract_type', ['CDI', 'CDD', 'Stage', 'Consultant', 'Freelance', 'Bénévole'])->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Revenir aux anciens ENUMs
            $table->enum('gender', ['Homme','Femme'])->nullable()->change();
            $table->enum('department', ['Technique','Ressources Humaines','Finance'])->nullable()->change();
            $table->enum('contract_type', ['CDI','CDD','Stage'])->nullable()->change();
        });
    }
};
