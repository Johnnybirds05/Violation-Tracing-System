<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class DriverRegisterController extends Controller
{
    //
    public function index(){
        return view('driver/driver-register');
    }

    public function store(Request $req){
        return $req;
        if($req->terms == false){
            return response()->json([
                'status' => 'terms'
            ], 422);
        }
        return;

        $dob = date("Y-m-d", strtotime($req->bdate));
        $expr = date("Y-m-d", strtotime($req->expr));


        $req->validate([
            'username' => ['required', 'string', 'unique:users'],
            'lname' => ['required', 'string', 'max:100'],
            'fname' => ['required', 'string', 'max:100'],
            'sex' => ['required', 'string', 'max:20'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'mobile_no' => ['required'],
            

//            'province' => ['required', 'string'],
//            'city' => ['required', 'string'],
//            'barangay' => ['required', 'string'],
        ]);

        $qr_code = substr(md5(time() . $req->lname . $req->fname), -8);

        User::create([
            'qr_ref' => $qr_code,
            'username' => $req->username,
            'password' => Hash::make($req->password),
            'email' => $req->email,
            'lname' => strtoupper($req->lname),
            'fname' => strtoupper($req->fname),
            'mname' => strtoupper($req->mname),
            'suffix' => strtoupper($req->suffix),
            'sex' => $req->sex,
            'bdate' => $dob,
            'driver_license_type' => $req->driver_license_type,
            'driver_license_no' => $req->driver_license_no,
            'expr_date' => $expr,
            'mobile_no' => $req->mobile_no,
            'role' => 'DRIVER',
            'province' => $req->province,
            'city' => $req->city,
            'barangay' => $req->barangay,
            'street' => strtoupper($req->street)
        ]);

        return response()->json([
            'status' => 'saved'
        ],200);
    }
}
