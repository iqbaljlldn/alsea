<?php

namespace App\Models;

use App\Models\Driver;
use App\Models\History;
use App\Models\Shipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'departure_time',
        'arrival_time',
        'in_factory_time',
        'out_factory_time',
        'in_warehouse_time',
        'out_warehouse_time'
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class, 'shipment_id', 'id');
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }

    public function history()
    {
        return $this->morphMany(History::class, 'containerable');
    }
}
