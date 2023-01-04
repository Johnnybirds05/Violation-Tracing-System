<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementType extends Model
{
    use HasFactory;

    protected $table = 'requirement_types';
    protected $primaryKey = 'requirement_type_id';


    protected $fillable = ['requirement_type'];


    public function requirements(){
        return $this->hasMany(Requirement::class, 'requirement_type_id', 'requirement_type_id');
    }
}
