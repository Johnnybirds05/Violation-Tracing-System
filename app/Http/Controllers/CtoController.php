<?php

namespace App\Http\Controllers;

use App\Models\cto;
use Illuminate\Http\Request;

class CtoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/logins/cto');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cto  $cto
     * @return \Illuminate\Http\Response
     */
    public function show(cto $cto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cto  $cto
     * @return \Illuminate\Http\Response
     */
    public function edit(cto $cto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cto  $cto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cto $cto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cto  $cto
     * @return \Illuminate\Http\Response
     */
    public function destroy(cto $cto)
    {
        //
    }
}
