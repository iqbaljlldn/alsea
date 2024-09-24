<?php

namespace App\Models;

use App\Models\User;
use App\Models\Company;
use App\Models\Attachment;
use App\Models\Fcl_container;
use App\Models\Lcl_container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'mbl_number',
        'do_number',
        'si_number',
        'origin',
        'destination',
        'planning_stuffing',
        ];

        public function attachment() {
            return $this->hasOne(Attachment::class, 'id', 'shipment_id');
        }

        public function lcl_container() {
            return $this->hasOne(Lcl_container::class, 'id', 'shipment_id');
        }

       public function fcl_container() {
           return $this->hasOne(Fcl_container::class, 'id', 'shipment_id');
        }

        public function company() {
            return $this->belongsTo(Company::class, 'company_id', 'id');
        }

        public function user() {
            return $this->belongsTo(User::class, 'user_id', 'id');
        }
}
