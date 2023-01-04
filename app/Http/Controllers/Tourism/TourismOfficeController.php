<?php

namespace App\Http\Controllers\Tourism;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class TourismOfficeController extends Controller
{
    //


    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $req){
    }


    public function update(Request $req, $id){
        $req->validate([
            'lname'=> ['required'],
            'fname' => ['required'],
            'sex' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'barangay' => ['required'],
            'email' => ['required', 'unique:users,email,'.$id.',user_id'],
            'mobile_no' => ['required', 'regex:((^(\+)(\d){12}$)|(^\d{11}$))', 'unique:users,mobile_no,' .$id.',user_id'],

        ], $message = [
            'fname.required' => 'First Name is required',
            'lname.required' => 'Lastname Name is required',
        ]);

        $data = Office::find($id);
        $data->lname = strtoupper($req->lname);
        $data->fname = strtoupper($req->fname);
        $data->mname = strtoupper($req->mname);
        $data->suffix = strtoupper($req->suffix);
        $data->sex = strtoupper($req->sex);
        $data->province = $req->province;
        $data->city = $req->city;
        $data->barangay = $req->barangay;
        $data->street = strtoupper($req->street);
        $data->email = $req->email;
        $data->driver_license_type = $req->driver_license_type;
        $data->driver_license_no = $req->driver_license_no;
        $data->expr_date = $req->expr_date;

        $data->mobile_no = $req->mobile_no;

        $data->save();

        return response()->json([
            'status' => 'updated'
        ], 200);
    }


    public function destroy($id){
        $data = Office::find($id);

        if(Storage::exists('public/avatars/' .$data->avatar)) {
            Storage::delete('public/avatars/' . $data->avatar);
        }

        Office::destroy($id);

        return response()->json([
            'status' => 'deleted'
        ], 200);
    }

}
