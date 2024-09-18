<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lcl_container extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'driver_id',
        'plate_number',
        'photo_truck',
        'photo_sim',
        'type_truck',
        'size_truck',
    ];
}
