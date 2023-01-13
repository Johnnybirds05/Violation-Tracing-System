<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;



    protected $table = 'requirements';
    protected $primaryKey = 'requirement_id';


    protected $fillable = ['requirement_type_id', 'requirement_name', 'location', 'cost'];

    public function requirement_type(){
        return $this->belongsTo(RequriementType::class, 'requirement_type_id', 'requirement_type_id');
    }
    
}
