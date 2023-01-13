<?php

namespace App\Http\Controllers\Tourism;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }


    public function getAccountTourism(Request $req){
        return User::where('role', '!=', 'DRIVER')
            ->get();
    }

    public function show($id){
        return User::find($id);
    }


    public function store(Request $req){


        $req->validate([
            'username' => ['required', 'unique:users'],
            'lname' => ['required'],

        ]);

        User::create([
            'username' => $req->username,
            'password' => Hash::make($req->password),
            'lname' => strtoupper($req->lname),
            'fname' => strtoupper($req->fname),
            'mname' => strtoupper($req->mname),
            'suffix' => strtoupper($req->suffix),
            'role' => strtoupper($req->role)
        ]);

        return response()->json([
            'status' => 'saved'
        ], 200);
    }

    public function update(Request $req, $id){
        $req->validate([
            'lname' => ['required'],
        ]);

        $data = User::find($id);
        $data->lname = strtoupper($req->lname);
        $data->fname = strtoupper($req->fname);
        $data->mname = strtoupper($req->mname);
        $data->suffix = strtoupper($req->suffix);
        $data->role = strtoupper($req->role);
        $data->save();
        return response()->json([
            'status' => 'updated'
        ], 200);

    }

    public function destroy($id){
        User::destroy($id);
        return response()->json([
            'status' => 'deleted'
        ], 200);
    }

}
