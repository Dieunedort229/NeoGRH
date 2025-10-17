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
        Schema::create('prestataires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->string('entreprise')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('telephone')->nullable();
            $table->text('adresse')->nullable();
            $table->string('specialite');
            $table->enum('type_prestation', ['Consultant', 'Fournisseur', 'Service'])->default('Consultant');
            $table->decimal('tarif_journalier', 10, 2)->nullable();
            $table->text('competences')->nullable();
            $table->enum('statut', ['Actif', 'Inactif', 'Blacklisté'])->default('Actif');
            $table->date('date_debut_collaboration')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestataires');
    }
};
