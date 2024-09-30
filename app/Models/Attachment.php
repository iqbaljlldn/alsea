<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shipment;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'file_type',
        'file_path',
    ];

    public function shipment() {
        return $this->belongsTo(Shipment::class, 'shipment_id', 'id');
    }
}
