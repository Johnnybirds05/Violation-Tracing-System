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
        'ordinance_id',
        'driver_lname',
        'driver_fname',
        'driver_mname',
        'driver_suffix',
        'driver_mobile_no',
        'driver_location_province',
        'driver_location_city',
        'driver_location_street',
    ];

    public function ordinances(){
        return $this->hasMany(Ordinance::class, 'ordinance_id', 'ordinance_id');
    }
}
