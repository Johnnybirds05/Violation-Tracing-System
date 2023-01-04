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
        'user_id',
        'qr_ref',
        'plate_no',
        'model',
        'body_type',
        'serial_no',
        'color',
        'expr_date',
        'receipt_no',
        'vehicle_img',
        'is_verified',
    ];



    public function driver(){
        return $this->belongsTo(User::class, 'user_id', 'user_id')
            ->with(['province', 'city', 'barangay']);
    }
}
