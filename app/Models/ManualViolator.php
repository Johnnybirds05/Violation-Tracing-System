<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualViolator extends Model
{
    use HasFactory;


    protected $table = 'manual_violators';
    protected $primaryKey = 'manual_violator_id';

    protected $fillable = [
        'lname',
        'fname',
        'mname',
        'suffix',
        'province',
        'city',
        'barangay',
        'street',
        'model',
        'plate_no',
        'citation_no',
        'ordinance_id',
        'ordinance_penalty_id',
    ];
}
