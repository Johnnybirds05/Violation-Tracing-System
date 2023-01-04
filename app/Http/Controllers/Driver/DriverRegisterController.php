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
        //return $req;

        if($req->terms == 'false'){
            return response()->json([
                'errors' => 'terms'
            ], 422);
        }

        $dob = date("Y-m-d", strtotime($req->bdate));
        $expr = date("Y-m-d", strtotime($req->expr_date));


        $req->validate([
            'username' => ['required', 'unique:users'],
            'lname' => ['required', 'string', 'max:100'],
            'fname' => ['required', 'string', 'max:100'],
            'sex' => ['required', 'string', 'max:20'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'mobile_no' => ['required', 'regex:((^(\+)(\d){12}$)|(^\d{11}$))', 'unique:users'],
            'bdate' => ['required'],
            'expr_date' => ['required'],
            'driver_license_no' => ['required'],
            'driver_license_type' => ['required'],
//            'province' => ['required', 'string'],
//            'city' => ['required', 'string'],
//            'barangay' => ['required', 'string'],
        ], $message = [
            'username.required' => 'Username is required.',
            'fname.required' => 'First Name is required',
            'lname.required' => 'Lastname Name is required',

        ]);

        $qr_code = substr(md5(time() . $req->lname . $req->fname), -8);

        $file = $req->file('profile_picture');

        $file_location = '';

        if($file){
            //check the file and delete to update
            // if(Storage::exists('public/certificates/' .$data->file)) {
            //     Storage::delete('public/certificates/' . $data->bhouse_img_path);
            // }
            $filePath = $file->store('public/avatars'); //get path of the file
            $filePathArray = explode('/', $filePath); //split into array using /
            $file_location = $filePathArray[2];
        }


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
            'street' => strtoupper($req->street),
            'avatar' => $file_location
        ]);





        return response()->json([
            'status' => 'saved'
        ],200);
    }
}
