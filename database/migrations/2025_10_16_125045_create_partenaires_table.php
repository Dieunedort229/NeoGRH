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
        Schema::create('partenaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom_organisation');
            $table->enum('type_partenaire', ['Bailleur', 'Partenaire technique', 'Partenaire local', 'Gouvernement'])->default('Partenaire local');
            $table->string('contact_principal')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->text('adresse')->nullable();
            $table->string('site_web')->nullable();
            $table->text('domaine_intervention')->nullable();
            $table->enum('statut', ['Actif', 'Inactif', 'En négociation'])->default('Actif');
            $table->date('date_debut_partenariat')->nullable();
            $table->date('date_fin_partenariat')->nullable();
            $table->text('accords_signes')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partenaires');
    }
};
