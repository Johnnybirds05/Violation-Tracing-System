<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DriverVehicleController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function getVehicles(){
        $user = Auth::user();

        $data = Vehicle::where('user_id', $user->user_id)->get();

        return $data;
    }
    public function store(Request $req){
        $user = Auth::user();
        $expr = date("Y-m-d", strtotime($req->expr_date));
        $file = $req->file('vehicle_img');

        $req->validate([
            'model' => ['required'],
            'body_type' => ['required'],
            'color' => ['required'],
            'plate_no' => ['required'],
            'receipt_no' => ['required'],
            'expr_date' => ['required'],
            'vehicle_img' => ['required', 'mimes:jpeg,jpg,png,gif'],
        ]);


        $file_location = '';

        if($file){
            //check the file and delete to update
            // if(Storage::exists('public/certificates/' .$data->file)) {
            //     Storage::delete('public/certificates/' . $data->bhouse_img_path);
            // }
            $filePath = $file->store('public/vehicles'); //get path of the file
            $filePathArray = explode('/', $filePath); //split into array using /
            $file_location = $filePathArray[2];
        }
        $qr = substr(md5(time() . $req->model . $req->plate_no), -10);

        Vehicle::create([
            'user_id' => $user->user_id,
            'qr_ref' => $qr,
            'model' => strtoupper($req->model),
            'body_type' => strtoupper($req->body_type),
            'color' => strtoupper($req->color),
            'serial_no' => strtoupper($req->serial_no),
            'plate_no' => strtoupper($req->plate_no),
            'receipt_no' => strtoupper($req->receipt_no),
            'expr_date' => $expr,
            'vehicle_img' => $file_location
        ]);

        return response()->json([
            'status' => 'saved'
        ], 200);
    }


    public function destroy($id){

        $data = Vehicle::find($id);

        if(Storage::exists('public/vehicles/' .$data->vehicle_img)) {
            Storage::delete('public/vehicles/' . $data->vehicle_img);
        }

        Vehicle::destroy($id);

        return response()->json([
            'status' => 'deleted'
        ], 200);
    }
}
