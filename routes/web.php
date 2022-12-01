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

Route::get('/logindriver', function () {
    return view('driver/driverlogin');
});

Route::get('/registerdriver', function () {
    return view('driver/driverregister');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cto', [App\Http\Controllers\CtoController::class, 'index'])->name('cto');