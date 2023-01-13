<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violator extends Model
{
    use HasFactory;

    protected $table = 'violators';
    protected $primaryKey = 'violator_id';

    protected $fillable = [
        'citation_no',
        'plate_no',
        'user_id',
        'ordinance_id',
        'ordinance_penalty_id',
        'driver_lname',
        'driver_fname',
        'driver_mname',
        'driver_suffix',
        'driver_mobile_no',
        'driver_location_province',
        'driver_location_city',
        'driver_location_street',
        'date_violate',
        'is_settled',
    ];

    public function ordinance(){
        return $this->hasOne(Ordinance::class, 'ordinance_id', 'ordinance_id');
    }

    public function ordinance_penalty(){
        return $this->hasOne(OrdinancePenalty::class, 'ordinance_penalty_id', 'ordinance_penalty_id');
    }

    public function driver(){
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }


}
