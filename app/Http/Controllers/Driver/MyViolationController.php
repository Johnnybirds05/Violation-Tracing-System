<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Violator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyViolationController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function getMyViolations(){
        $user = Auth::user();
        $data = Violator::with(['ordinance', 'ordinance_penalty', 'driver'])
            ->where('user_id', $user->user_id)
            ->get();
        return $data;
    }
}
