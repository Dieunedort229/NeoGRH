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
        Schema::create('banques', function (Blueprint $table) {
            $table->id();
            $table->string('nom_banque');
            $table->string('numero_compte');
            $table->string('type_compte')->default('Courant');
            $table->string('devise')->default('FCFA');
            $table->decimal('solde_initial', 15, 2)->default(0);
            $table->decimal('solde_actuel', 15, 2)->default(0);
            $table->string('responsable_compte')->nullable();
            $table->string('contact_banque')->nullable();
            $table->text('adresse_banque')->nullable();
            $table->enum('statut', ['Actif', 'Fermé', 'Suspendu'])->default('Actif');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banques');
    }
};
