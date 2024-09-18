<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
