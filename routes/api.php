<?php

use App\Http\Controllers\Driver\DriverController;
use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\Vehicle\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('driver/getAll', [DriverController::class, 'getDriver']);
Route::post('driver', [DriverController::class, 'saveDriver']);

Route::get('owner/getAll', [OwnerController::class, 'getOwner']);
Route::post('owner', [OwnerController::class, 'saveOwner']);

Route::get('vehicle/getAll', [VehicleController::class, 'getVehicle']);
Route::post('vehicle', [VehicleController::class, 'saveVehicle']);

