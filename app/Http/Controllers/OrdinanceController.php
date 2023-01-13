<?php

namespace App\Http\Controllers;

use App\Models\Ordinance;
use Illuminate\Http\Request;
use App\Models\OrdinancePenalty;



class OrdinanceController extends Controller
{
    //



    public function getAllOrdiances(){

        $data = Ordinance::with(['ordinance_penalties'])
            ->get();

        return $data;
    }


    public function getOrdinancePenalties($ordinance_id){

        $data = OrdinancePenalty::where('ordinance_id', $ordinance_id)
            ->get();

        return $data;
    }
}
