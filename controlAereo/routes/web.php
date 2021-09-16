<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AeronaveController;
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
    return view('lista');
});

//Guardar
Route::post('/guardar','App\Http\Controllers\AeronaveController@guardar')->name('guardar');
//Listar
Route::get('/','App\Http\Controllers\AeronaveController@listar');
//Eliminar
Route::delete('/eliminar/{aeronave_id}','App\Http\Controllers\AeronaveController@eliminar')->name('eliminar');
//Vista editar
Route::get('/vistaEditar/{aeronave_id}','App\Http\Controllers\AeronaveController@vistaEditar')->name('vistaEditar');
//Editar
Route::patch('/editar/{aeronave_id}','App\Http\Controllers\AeronaveController@editar')->name('editar');
//Cambiar estado
Route::get('/cambio/{aeronave_id}','App\Http\Controllers\AeronaveController@cambio')->name('cambio');