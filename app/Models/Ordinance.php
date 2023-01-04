<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordinance extends Model
{
    use HasFactory;

    protected $table = 'ordinances';
    protected $primaryKey = 'ordinance_id';

    protected $fillable = [
        'ordinance_name',
        'description',

    ];

    public function ordinance_penalties(){
        return $this->hasMany(OrdinancePenalty::class, 'ordinance_id', 'ordinance_id');
    }
}
