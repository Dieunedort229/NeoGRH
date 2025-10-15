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
            // Informations personnelles
            $table->enum('gender', ['Homme','Femme'])->nullable()->after('name');
            $table->date('birth_date')->nullable()->after('gender');
            $table->string('address')->nullable()->after('birth_date');
            $table->string('phone')->nullable()->after('address');

            // Informations professionnelles
            $table->string('fonction')->nullable()->after('phone'); 
            $table->string('matricule')->nullable()->after('fonction');
            $table->string('prestation_type')->nullable()->after('matricule');
            $table->string('entreprise')->nullable()->after('prestation_type');
            $table->enum('department', ['Technique','Ressources Humaines','Finance'])->nullable()->after('entreprise');
            $table->date('hire_date')->nullable()->after('department');
            $table->enum('contract_type', ['CDI','CDD','Stage'])->nullable()->after('hire_date');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn([
            'gender','birth_date','address','phone',
            'fonction','matricule','prestation_type','entreprise','department','hire_date','contract_type'
        ]);
    });
    }
};
