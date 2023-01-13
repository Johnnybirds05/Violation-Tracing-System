<?php

namespace App\Http\Controllers\LocalLegislative;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ordinance;

class LegislativeController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        return view('legislative.legislative-dashboard');
    }

    



    
}
