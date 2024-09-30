<?php

namespace App\Models;

use App\Models\Driver;
use App\Models\History;
use App\Models\Shipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fcl_container extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'driver_id',
        'plate_number',
        'seal_number',
        'photo_container',
        'photo_seal',
        'type_container',
        'date_stuffing',
        'departure_time',
        'arrival_time',
        'in_factory_time',
        'out_factory_time',
        'in_port_time',
        'out_port_time',
    ];

    public function shipment() {
        return $this->belongsTo(Shipment::class, 'shipment_id', 'id');
    }
    public function driver() {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }

    public function history() {
        return $this->morphOne(History::class, 'container');
    }
}
