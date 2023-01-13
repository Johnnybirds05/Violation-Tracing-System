<?php

namespace App\Http\Controllers\LocalLegislative;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ordinance;
use App\Models\OrdinancePenalty;


class LegislativeOrdinanceController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        
    }


    public function show($id){
        return Ordinance::with(['ordinance_penalties'])->find($id);
    }

    public function loadOrdinances(){
        $data = Ordinance::with(['ordinance_penalties'])
            ->orderBy('ordinance_id', 'desc')
            ->get();

        return $data;
    }

    public function store(Request $req){
        //return $req;

        $req->validate([
            'ordinance_name' => ['required', 'unique:ordinances']
        ]);


        $data = Ordinance::create([
            'ordinance_name' => $req->ordinance_name,
            'description' => $req->description,
        ]);

        foreach($req->ordinance_penalties as $item){
            OrdinancePenalty::create([
                'ordinance_id' => $data->ordinance_id,
                'offense_order' => $item['order_no'],
                'cost' => $item['cost'],
                'is_impound' => $item['is_impound'] ? 1 : 0
            ]);
        }

        return response()->json([
            'status' => 'saved'
        ], 200);
    }

    public function update(Request $req, $id){
        $req->validate([
            'ordinance_name' => ['required', 'unique:ordinances,ordinance_name,' .$id. ',ordinance_id']
        ]);

        $data = Ordinance::find($id);
        $data->ordinance_name = $req->ordinance_name;
        $data->description = $req->description;
        $data->save();

        foreach($req->ordinance_penalties as $item){
           

            OrdinancePenalty::updateOrCreate([
                'ordinance_id' => $data->ordinance_id,
                'offense_order' => $item['offense_order'],
            ],[
                'ordinance_id' => $data->ordinance_id,
                'offense_order' => $item['offense_order'],
                'cost' => $item['cost'],
                'is_impound' => $item['is_impound'] ? 1 :  0 
            ]);
        }


        return response()->json([
            'status' => 'updated'
        ], 200);
    }


    public function destroy($id){

        Ordinance::destroy($id);

        return response()->json([
            'status' => 'deleted'
        ], 200);
    }
}
