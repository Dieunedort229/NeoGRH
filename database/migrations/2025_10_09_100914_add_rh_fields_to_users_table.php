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
            $table->enum('department', ['Technique','Ressources Humaines','Finance'])->nullable()->after('fonction');
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
                    'fonction','department','hire_date','contract_type'
                ]);
        });
    }
};
