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



Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers','CustomerController');

Route::resource('indicadores', IndicadorController::class);

Route::resource('books', BooksController::class);


//Indicador
//Route::resource('indicador','IndicadorController');

//Route::get('/indicador/edit/{id}',[IndicadorController::class,'edit'])->name('indicador.edit');

//Route::get('/create',[IndicadorController::class,'create'])->name('indicador.create');
//Route::get('indicador',[IndicadorController::class,'index'])->name('indicador.index');

//Route::get('/indicador/{id}/confirm','IndicadorController@confirm')->name('indicador.confirm');
//Route::resource('/indicadores','IndicadorController');

//Route::get('indicador/eliminar/{id}', [IndicadorController::class, 'confirm'])->name('indicador.confirm');


//Route::get('/edit',[IndicadorController::class,'edit'])->name('indicador.edit');
//Route::post('indicador', [IndicadorControllerr::class, 'registrar'])->name('indicador.registrar');




//animal

//Route::get('animal', 'AnimalController@inicio')->name('home');

//Route::get('/',[AnimalController::class,'animalData'])->name('animal.inicio');

//Route::get('/indicador', 'IndicadorController@index');

//Route::get('/indicador',[IndicadorController::class,'index'])->name('index');
//Route::get('','IndicadorController@getIndicadores')->name('show');

//Route::get('/index', [IndicadorController::class,'index'])->name('index');
//Route::get('/show', [IndicadorController::class, 'show']);
//Route::post('/save', 'IndicadorController@save');

//Route::resource('indicador',IndicadoresController::class);

//Route::get('/update',[IndicadorController::class,'update'])->name('update');
//Route::get('/save',[IndicadorController::class,'save'])->name('save');
