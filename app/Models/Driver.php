<?php

namespace App\Models;

use App\Models\Fcl_container;
use App\Models\Lcl_container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact',
    ];

    public function fcl_container() {
        return $this->hasOne(Fcl_container::class, 'id', 'driver_id');
    }

    public function lcl_container() {
        return $this->hasOne(Lcl_container::class, 'id', 'driver_id');
    }
}
