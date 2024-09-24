<?php

namespace App\Models;

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
    ];

    public function shipment() {
        return $this->belongsTo(Shipment::class, 'shipment_id', 'id');
    }

    public function history() {
        return $this->morphOne(History::class, 'container');
    }
}
