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
        Schema::create('icl_containers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipment_id');
            $table->foreignId('driver_id');
            $table->string('plate_number');
            $table->string('photo_truck');
            $table->string('photo_sim');
            $table->string('type_truck');
            $table->string('size_truck');
            $table->timestamp('departure_time');
            $table->timestamp('arrival_time');
            $table->timestamp('in_factory_time');
            $table->timestamp('out_factory_time');
            $table->timestamp('in_warehouse_time');
            $table->timestamp('out_warehouse_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('icl_containers');
    }
};
