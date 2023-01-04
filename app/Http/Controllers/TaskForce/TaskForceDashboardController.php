<?php

namespace App\Http\Controllers\TaskForce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Violator;

class TaskForceDashboardController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    
    public function index(){
        return view('taskforce/taskforce-dashboard');
    }

    public function getDriverViolations(Request $req){

        $driverId = $req->driver;

        $data = Violator::where('user_id', $driverId)
            ->with(['ordinance', 'ordinance_penalty'])
            ->where('is_settled', 0)
            ->get();

        return $data;
    }

    public function storeCitation(Request $req){
        $driver_id = $req->driver_id;

        $citations = $req->citations;

        foreach($citations as $citation){
            Violator::create([
                'user_id' => $driver_id,
                'ordinance_id' => $citation['ordinance_id'],
                'ordinance_penalty_id' => $citation['ordinance_penalty_id'],
                'date_violate' => date('Y-m-d')
            ]);
        }


        return response()->json([
            'status' => 'saved'
        ], 200);
    }
}
