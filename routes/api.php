<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorConsultController;
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

Route::post('/doctors', [DoctorController::class,'create']);

Route::post('/patients', [PatientController::class, 'create']);

Route::post('/doctors/{id}/meeting', [DoctorConsultController::class, 'create']);

Route::get('/doctors/consults', [DoctorConsultController::class, 'index']);

