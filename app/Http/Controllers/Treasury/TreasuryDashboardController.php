<?php

namespace App\Http\Controllers\Treasury;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Violator;
use App\Models\User;


class TreasuryDashboardController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        return view('counsel-treasury.counsel-treasury-dashboard');
    }


    public function settleViolation($violatorId){
        $data = Violator::find($violatorId);
        $data->is_settled = 1;
        $data->saved();

        return response()->json([
            'status' => 'saved'
        ], 200);
    }

    public function unsettleViolation($violatorId){
        $data = Violator::find($violatorId);
        $data->is_settled = 0;
        $data->saved();

        return response()->json([
            'status' => 'saved'
        ], 200);
    }


    public function getViolatorsTreasury(){
        // $data = DB::table('violators as a')
        //     ->join('users as b', 'a.user_id', 'b.user_id')
        //     ->get();

        $data = User::with('violations')
            ->get();

        return $data;
    }

}
