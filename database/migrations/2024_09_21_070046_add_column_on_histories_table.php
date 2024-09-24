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
        Schema::table('histories', function(Blueprint $table) {
            $table->unsignedBigInteger('container_id');
            $table->string('container_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('histories', function(Blueprint $table) {
            $table->dropColumn('container_id', 'container_type');
        });
    }
};
