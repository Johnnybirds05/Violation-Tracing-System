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

Auth::routes([
    'login' => false,
    'register' => false
]);


//ADDRESS
Route::get('/load-provinces', [App\Http\Controllers\AddressController::class, 'loadProvinces']);
Route::get('/load-cities', [App\Http\Controllers\AddressController::class, 'loadCities']);
Route::get('/load-barangays', [App\Http\Controllers\AddressController::class, 'loadBarangays']);




// Route::get('/', function () {
//     return view('homepage/home');
// });

Route::get('/admins', function () {
    return view('logins/office');
});

Route::get('/tourism-dashboard', [App\Http\Controllers\Tourism\TourismDashboardController::class, 'index']);

Route::get('/legislative-dashboard', [App\Http\Controllers\LocalLegislative\LegislativeController::class, 'index']);


Route::get('/load-ordinances', [App\Http\Controllers\LocalLegislative\LegislativeOrdinanceController::class, 'loadOrdinances']);
Route::resource('/legislative-ordinance', App\Http\Controllers\LocalLegislative\LegislativeOrdinanceController::class);

Route::resource('/ordinance-penalty', App\Http\Controllers\LocalLegislative\LegislativeOrdinancePenaltyController::class);


//Treasury
Route::resource('/counsel-treasury-dashboard', App\Http\Controllers\Treasury\TreasuryDashboardController::class);
Route::get('/get-violators-treasury',[App\Http\Controllers\Treasury\TreasuryDashboardController::class, 'getViolatorsTreasury']);

Route::post('/settle-violation', [App\Http\Controllers\Treasury\TreasuryDashboardController::class, 'settleViolation']);
Route::post('/unsettle-violation', [App\Http\Controllers\Treasury\TreasuryDashboardController::class, 'unsettleViolation']);



//-----------------DRIVER ROUTES----------------------
Route::get('/', [App\Http\Controllers\Driver\CustomLoginController::class, 'index']);
Route::post('/driver-login', [App\Http\Controllers\Driver\CustomLoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Driver\CustomLoginController::class, 'logout']);

Route::get('/driver-register', [App\Http\Controllers\Driver\DriverRegisterController::class, 'index']);
Route::post('/driver-register', [App\Http\Controllers\Driver\DriverRegisterController::class, 'store']);

Route::get('/driver-dashboard', [App\Http\Controllers\Driver\DriverDashboardController::class, 'index']);
Route::post('/submit-vehicle-info', [App\Http\Controllers\Driver\DriverDashboardController::class, 'store']);

Route::post('/driver-submit-vehicle', [App\Http\Controllers\Driver\DriverVehicleController::class, 'store']);
Route::get('/get-vehicles', [App\Http\Controllers\Driver\DriverVehicleController::class, 'getVehicles']);
Route::delete('/driver-delete-vehicle/{id}', [App\Http\Controllers\Driver\DriverVehicleController::class, 'destroy']);



Route::resource('/drivers', App\Http\Controllers\Driver\DriverController::class);
Route::get('/get-driver-vehicles/{driverId}', [App\Http\Controllers\Driver\DriverController::class, 'getDriverVehicles']);
//save vehicle from driver form
Route::post('/submit-vehicle', [App\Http\Controllers\Driver\DriverController::class, 'submitVehicle']);




Route::get('/get-driver', [App\Http\Controllers\Driver\DriverDashboardController::class, 'getDriver']);
Route::get('/get-my-violations', [App\Http\Controllers\Driver\MyViolationController::class, 'getMyViolations']);

Route::get('/print-qr/{qr}', [App\Http\Controllers\Driver\PrintQrController::class, 'printQr']);


//-----------------DRIVER ROUTES----------------------




//Requirements Type
Route::get('/get-all-requirements', [App\Http\Controllers\RequirementController::class, 'getAllRequirements']);


//Ordiances
Route::get('/get-all-ordinances', [App\Http\Controllers\OrdinanceController::class, 'getAllOrdiances']);
Route::get('/get-ordinance-penalties/{id}', [App\Http\Controllers\OrdinanceController::class, 'getOrdinancePenalties']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cto', [App\Http\Controllers\CtoController::class, 'index'])->name('cto');




//-----------------TOURISM ROUTES----------------------
Route::get('/get-all-drivers-accounts', [App\Http\Controllers\Tourism\TourismDriverController::class, 'getDriverAccounts']);

Route::get('/get-all-office-accounts', [App\Http\Controllers\Tourism\TourismOfficeController::class, 'index']);


Route::get('/get-requirement-types', [App\Http\Controllers\Tourism\RequirementTypeController::class, 'getRequirementTypes']);


Route::resource('/requirements', App\Http\Controllers\Tourism\RequirementController::class);
Route::get('/get-requirements', [App\Http\Controllers\Tourism\RequirementController::class, 'getRequirements']);

Route::resource('/accounts', App\Http\Controllers\Tourism\AccountController::class);
Route::get('/get-accounts-tourism', [App\Http\Controllers\Tourism\AccountController::class, 'getAccountTourism']);


//-----------------TASK FORCE ROUTES----------------------
//

Route::get('/taskforce-dashboard', [App\Http\Controllers\TaskForce\TaskForceDashboardController::class, 'index']);
Route::get('/get-driver-violations', [App\Http\Controllers\TaskForce\TaskForceDashboardController::class, 'getDriverViolations']);
Route::post('/submit-citation', [App\Http\Controllers\TaskForce\TaskForceDashboardController::class, 'storeCitation']);

Route::post('/submit-citation-manual', [App\Http\Controllers\TaskForce\TaskForceDashboardController::class, 'storeCitationManual']);


Route::get('/validate-qr/{qr}', [App\Http\Controllers\ValidateQrController::class, 'validateQr']);













//extra routes for testing only
Route::get('/session', function(){
    return Session::all();
});


Route::get('/applogout', function(Request $req){
    \Auth::logout();
    $req->session()->invalidate();
    $req->session()->regenerateToken();


});

Route::get('/test', function(){
    return view('test');
});
