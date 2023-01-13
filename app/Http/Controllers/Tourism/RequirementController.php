<?php

namespace App\Http\Controllers\Tourism;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requirement;


class RequirementController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        
    }

    public function show($id){
        return Requirement::find($id);
    }

    public function getRequirements(Request $req)
    {  
        return Requirement::where('requirement_type_id', $req->req_type)
            ->get();
    }
    

    public function store(Request $req){
        $req->validate([
            'requirement_name' => ['required', 'unique:requirements']
        ]);

        Requirement::create([
            'requirement_type_id' => $req->requirement_type_id,
            'requirement_name' => strtoupper($req->requirement_name),
        ]);

        return response()->json([
            'status' => 'saved'
        ], 200);
    }
    


    public function update(Request $req, $id){
        $req->validate([
            'requirement_name' => ['required', 'unique:requirements,requirement_name,' .$id . ',requirement_id']
        ]);

        $data = Requirement::find($id);
        $data->requirement_id = $req->requirement_id;
        $data->requirement_name = strtoupper($req->requirement_name);
        $data->save();


        return response()->json([
            'status' => 'updated'
        ], 200);
    }

    public function destroy($id){
        Requirement::destroy($id);

        return response()->json([
            'status' => 'deleted'
        ], 200);
    }
}
