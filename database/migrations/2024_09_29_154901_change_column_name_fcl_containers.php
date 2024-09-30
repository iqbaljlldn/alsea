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
        Schema::table('fcl_containers', function (Blueprint $table) {
            $table->renameColumn('sea_number', 'seal_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fcl_containers', function (Blueprint $table) {
            $table->dropColumn('seal_number');
        });
    }
};
