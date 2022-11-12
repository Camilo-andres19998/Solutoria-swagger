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
use App\Http\Controllers\IndicadorController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\IndicadorControllerSeeder;

Route::get('/', function () {
    return view('welcome');
});



Route::resource('indicadores', IndicadorController::class);

Route::get('graficos',[IndicadorControllerSeeder::class,'index']);



Route::get('reportes', [ReportesController::class, 'index'])->name('reportes');
Route::get('reportes/records', [ReportesController::class, 'records'])->name('reportes/records');

Route::redirect('/', 'reportes');
