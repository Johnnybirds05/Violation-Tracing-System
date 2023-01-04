<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use App\Models\RequirementType;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getAllRequirements(){
        $data = RequirementType::with(['requirements'])
            ->orderBy('requirement_type_id', 'asc')
            ->get();

        return $data;
    }
}
