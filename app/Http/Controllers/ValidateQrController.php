<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;


use Illuminate\Http\Request;

class ValidateQrController extends Controller
{
    //

    public function validateQr($qr){

        $data = Vehicle::where('qr_ref', $qr)
            ->with(['driver'])
            ->first();

            return $data;
    }
}
