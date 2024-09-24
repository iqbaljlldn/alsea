<?php

namespace App\Models;

use App\Models\User;
use App\Models\Shipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'container_id',
        'user_id',
        'action_type',
        'related_id',
        'related_type'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function shipment() {
        return $this->belongsTo(Shipment::class, 'shipment_id','id');
    }
    public function container() {
        return $this->morphTo();
    }
}
