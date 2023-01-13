<?php

namespace App\Http\Controllers\Tourism;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequirementType;


class RequirementTypeController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }


    public function getRequirementTypes(){
        return RequirementType::all();
    }
}
