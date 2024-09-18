<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'mbl_number',
        'do_number',
        'si_number',
        'origin',
        'destination',
        'planning_stuffing',
        ];
}
