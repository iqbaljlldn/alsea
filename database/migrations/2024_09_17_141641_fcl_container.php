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
        Schema::create('fcl_containers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipment_id');
            $table->foreignId('driver_id');
            $table->string('plate_number');
            $table->string('seal_number');
            $table->string('photo_container');
            $table->string('photo_seal');
            $table->string('type_container');
            $table->date('date_stuffing');
            $table->timestamp('departure_time');
            $table->timestamp('arrival_time');
            $table->timestamp('in_factory_time');
            $table->timestamp('out_factory_time');
            $table->timestamp('in_port_time');
            $table->timestamp('out_port_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('fcl_containers');
    }
};
