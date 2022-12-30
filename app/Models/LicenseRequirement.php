<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseRequirement extends Model
{
    use HasFactory;

    protected $table = 'license_requirements';
    protected $primaryKey = 'license_requirement_id';

    protected $fillable = [
        'name',
        'location',
        'cost',

    ];


}
