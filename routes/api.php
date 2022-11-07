<?php

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
Route::post('/registro', [\App\Http\Controllers\AuthController::class, 'Register']);
Route::post('/acceso', [\App\Http\Controllers\AuthController::class, 'Login']);
Route::group(['middleware'=> ['auth:sanctum']], function(){

    Route::post('/indicadores',[\App\Http\Controllers\IndicadorsController::class,'store']);
   // Route::post('/storeindicadores', [\App\Http\Controllers\IndicadorsController::class, 'storeIndicadores']);
});
