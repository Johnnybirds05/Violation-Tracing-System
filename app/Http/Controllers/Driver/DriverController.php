<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Driver;

class DriverController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){

    }


    public function show($id){
        return User::find($id);
    }

    public function getDriverVehicles($driverId){
        $data = Vehicle::where('user_id', $driverId)
            ->get();

        return $data;
    }

    public function submitVehicle(Request $req){
        //return $req;
        
        foreach($req->all() as $item){

             
            $expr = date("Y-m-d", strtotime($item['expr_date']));

            $data = Vehicle::find($item['vehicle_id']);
            $data->plate_no = $item['plate_no'];
            $data->model = $item['model'];
            $data->body_type = $item['body_type'];
            $data->color = $item['color'];
            $data->serial_no = $item['serial_no'];
            $data->expr_date = $expr;
            $data->receipt_no = $item['receipt_no'];
            $data->is_verified = $item['is_verified'];
            $data->save();
        }

        return response()->json([
            'status' => 'updated'
        ], 200);

    }

    public function store(Request $req){

    }

    public function update(Request $req, $id){

        $req->validate([
            'lname' => ['required', 'string', 'max:100'],
            'fname' => ['required', 'string', 'max:100'],
            'sex' => ['required', 'string', 'max:20'],
            'email' => ['required',
                'unique:users,email,' .$id. ',user_id'],
            'mobile_no' => ['required', 'regex:((^(\+)(\d){12}$)|(^\d{11}$))',
                'unique:users,mobile_no,' . $id . ',user_id'],
            'bdate' => ['required'],
            'expr_date' => ['required'],
            'driver_license_no' => ['required'],
            'driver_license_type' => ['required'],
        ], $message = [
            'fname.required' => 'First Name is required',
            'lname.required' => 'Lastname Name is required',

        ]);


        $dob = date("Y-m-d", strtotime($req->bdate));
        $expr = date("Y-m-d", strtotime($req->expr_date));

        $data = User::find($id);
        $data->lname = strtoupper($req->lname);
        $data->fname = strtoupper($req->fname);
        $data->mname = strtoupper($req->mname);
        $data->suffix = strtoupper($req->suffix);
        $data->sex = $req->sex;
        $data->bdate = $dob;;
        $data->driver_license_type = $req->driver_license_no;
        $data->driver_license_no = $req->driver_license_no;
        $data->expr_date = $expr;;
        $data->mobile_no = $req->mobile_no;

        $data->province = $req->province;
        $data->city = $req->city;
        $data->street = strtoupper($req->street);

        $data->save();

        return response()->json([
            'cagadas' => 'updated'
        ], 200);
    }


}
