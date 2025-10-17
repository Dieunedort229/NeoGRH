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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->string('code_projet')->unique();
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->enum('statut', ['En cours', 'Terminé', 'Suspendu', 'Planifié'])->default('Planifié');
            $table->decimal('budget_total', 15, 2)->default(0);
            $table->decimal('budget_utilise', 15, 2)->default(0);
            $table->string('responsable')->nullable();
            $table->string('bailleur')->nullable();
            $table->text('objectifs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
