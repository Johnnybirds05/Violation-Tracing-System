<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class DriverDashboardController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('driver.driver-dashboard');
    }

    public function getDriver(){
        $user = Auth::user();

        $data = User::with(['province', 'city', 'barangay'])
            ->find($user->user_id);

        return $data;
    }


    public function store(Request $req){
        return $req;
        
    }

}
