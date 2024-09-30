<?php

namespace App\Models;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function shipment() {
        return $this->hasOne(Shipment::class,'id','company_id');
    }
}
