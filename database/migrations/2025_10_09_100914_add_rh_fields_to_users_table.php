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
            if (! Schema::hasColumn('users', 'gender')) {
                $table->enum('gender', ['Homme','Femme'])->nullable()->after('name');
            }
            if (! Schema::hasColumn('users', 'birth_date')) {
                $table->date('birth_date')->nullable()->after('gender');
            }
            if (! Schema::hasColumn('users', 'address')) {
                $table->string('address')->nullable()->after('birth_date');
            }
            if (! Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('address');
            }

            // Informations professionnelles
            if (! Schema::hasColumn('users', 'fonction')) {
                $table->string('fonction')->nullable()->after('phone');
            }
            if (! Schema::hasColumn('users', 'matricule')) {
                $table->string('matricule')->nullable()->after('fonction');
            }
            if (! Schema::hasColumn('users', 'prestation_type')) {
                $table->string('prestation_type')->nullable()->after('matricule');
            }
            if (! Schema::hasColumn('users', 'entreprise')) {
                $table->string('entreprise')->nullable()->after('prestation_type');
            }
            if (! Schema::hasColumn('users', 'department')) {
                $table->enum('department', ['Technique','Ressources Humaines','Finance'])->nullable()->after('entreprise');
            }
            if (! Schema::hasColumn('users', 'hire_date')) {
                $table->date('hire_date')->nullable()->after('department');
            }
            if (! Schema::hasColumn('users', 'contract_type')) {
                $table->enum('contract_type', ['CDI','CDD','Stage'])->nullable()->after('hire_date');
            }
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
