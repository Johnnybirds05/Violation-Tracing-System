<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
    protected $primaryKey = 'vehicle_id';

    protected $fillable = [
        'plate',
        'model',
        'body_type',
        'serial',
        'color',
        'expiration',
        'receipt_no',
        'vehicle_img_path',
        'is_verified',
    ];
}
