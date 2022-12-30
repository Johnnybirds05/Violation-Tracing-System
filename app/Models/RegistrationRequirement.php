<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationRequirement extends Model
{
    use HasFactory;

    protected $table = 'registration_requirements';
    protected $primaryKey = 'registration_requirement_id';

    protected $fillable = [
        'name',
        'location',
        'cost',

    ];
}
