<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdinancePenalty extends Model
{
    use HasFactory;


    protected $table = 'ordinance_penalties';
    protected $primaryKey = 'ordinance_penalty_id';

    protected $fillable = [
        'ordinance_id',
        'offense_order',
        'cost',
        'is_impound'
    ];


}
