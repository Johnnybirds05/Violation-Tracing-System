<?php

namespace App\Http\Controllers\TaskForce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


use App\Models\Violator;
use App\Models\User;
use App\Models\Ordinance;
use App\Models\ManualViolator;



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

    public function storeCitation(Request $req)
    {
        //return $req;

        $driver_id = $req->driver_id;

        $user = User::where('user_id', $driver_id)->first();


        $citations = $req->citations;

        foreach ($citations as $citation) {
            Violator::create([
                'citation_no' => $req->citation_no,
                'plate_no' => $req->plate_no,
                'user_id' => $driver_id,
                'ordinance_id' => $citation['ordinance_id'],
                'ordinance_penalty_id' => $citation['ordinance_penalty_id'],
                'date_violate' => date('Y-m-d')
            ]);


            $ordinance = Ordinance::where('ordinance_id', $citation['ordinance_id'])->first();
            //You have violated the ordinance {}, you may proceed to treasury office to settle your violation.

            if (env('SMS') == 1) {
                $msg = 'You have violated the ordinance ' . $ordinance->ordinance_name . ', you may proceed to treasury office to settle your violation.';
                try {
                    Http::withHeaders([
                        'Content-Type' => 'text/plain'
                    ])->post('http://' . env('IP_SMS_GATEWAY') . '/services/api/messaging?Message=' . $msg . '&To=' . $user->mobile_no . '&Slot=1', []);
                } catch (\Exception $e) {
                } //just hide the error
            }

        }

        return response()->json([
            'status' => 'saved'
        ], 200);
    }


    public function storeCitationManual(Request $req){
       //return $req;
        $data = $req->all();


        $citations = $data['citations'];


        foreach ($citations as $citation) {


            ManualViolator::create([
                'lname' => $data['lname'],
                'fname' => $data['fname'],
                'mname' => $data['mname'],
                'suffix' => $data['suffix'],
                'province' => $data['province'],
                'city' => $data['city'],
                'barangay' => $data['barangay'],
                'street' => $data['street'],
                'plate_no' => $data['plate_no'],
                'citation_no' => $data['citation_no'],
                'ordinance_id' => $citation['ordinance_id'],
                'ordinance_penalty_id' => $citation['ordinance_penalty_id'],
            ]);




            if (env('SMS') == 1) {
                $ordinance = Ordinance::where('ordinance_id', $citation['ordinance_id'])->first();
                //You have violated the ordinance {}, you may proceed to treasury office to settle your violation.
                $msg = 'You have violated the ordinance ' . $ordinance->ordinance_name . ', you may proceed to treasury office to settle your violation.';
                try {
                    Http::withHeaders([
                        'Content-Type' => 'text/plain'
                    ])->post('http://' . env('IP_SMS_GATEWAY') . '/services/api/messaging?Message=' . $msg . '&To=' . $user->mobile_no . '&Slot=1', []);
                } catch (\Exception $e) {
                } //just hide the error
            }

        }

        return response()->json([
            'status' => 'saved'
        ], 200);

    }

}
