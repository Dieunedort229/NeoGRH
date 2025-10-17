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
            if (! Schema::hasColumn('users', 'matricule')) {
                $table->string('matricule')->nullable()->after('fonction');
            }
            if (! Schema::hasColumn('users', 'prestation_type')) {
                $table->string('prestation_type')->nullable()->after('matricule');
            }
            if (! Schema::hasColumn('users', 'entreprise')) {
                $table->string('entreprise')->nullable()->after('prestation_type');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['matricule','prestation_type','entreprise']);
        });
    }
};
