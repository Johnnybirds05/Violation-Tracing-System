<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homepage/home');
});

Route::get('/admins', function () {
    return view('homepage/admins');
});

Route::get('/logincto', function () {
    return view('logins/cto');
});
Route::get('/logintask', function () {
    return view('logins/task');
});
Route::get('/logincounsel', function () {
    return view('logins/counsel');
});
Route::get('/logintourism', function () {
    return view('logins/tourism');
});
Route::get('/loginlegislative', function () {
    return view('logins/legislative');
});
Route::get('/tourism-dashboard', function () {
    return view('tourism/tourism-dashboard');
});
Route::get('/legislative-dashboard', function () {
    return view('legislative/legislative-dashboard');
});
Route::get('/counsel-treasury-dashboard', function () {
    return view('counsel-treasury/counsel-treasury-dashboard');
});

//-----------------DRIVER ROUTES----------------------
Route::get('/driver-login', [App\Http\Controllers\Driver\DriverLoginController::class, 'index']);
Route::post('/driver-login', [App\Http\Controllers\Driver\DriverLoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Driver\DriverLoginController::class, 'logout']);

Route::get('/driver-register', [App\Http\Controllers\Driver\DriverRegisterController::class, 'index']);

Route::get('/driver-dashboard', [App\Http\Controllers\Driver\DriverDashboardController::class, 'index']);



//-----------------DRIVER ROUTES----------------------




Auth::routes([
    'login' => false,
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cto', [App\Http\Controllers\CtoController::class, 'index'])->name('cto');





//extra routes for testing only

Route::get('/session', function(){
    return Session::all();
});


Route::get('/applogout', function(Request $req){
    \Auth::logout();
    $req->session()->invalidate();
    $req->session()->regenerateToken();


});
