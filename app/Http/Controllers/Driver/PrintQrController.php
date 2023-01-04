<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrintQrController extends Controller
{
    //


    public function printQr($qr){
        return view('print-qr')
        ->with('qr', $qr);
    }
}
