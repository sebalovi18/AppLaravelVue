<?php

use App\Http\Services\Clientes\ServiceClientesCrud;
use App\Http\Services\Emails\ServiceEnvioMails;
use App\Mail\Contacto;
use Illuminate\Support\Facades\Mail;
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

/* 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); 
*/

/* Noticias */

Route::get('noticias' , 'NoticiasController@getNoticias');

/* Contacto via email */
Route::post('contacto' , 'ContactoController@setMensaje');

/* Clientes Api */
Route::get('clientes','ClienteController@index');
Route::post('clientes','ClienteController@store');
Route::put('clientes/{id}','ClienteController@update');
Route::delete('clientes/{id}','ClienteController@destroy');

/* Registro de Mesas Api */
Route::get('registro' , 'RegistroMesasController@getAllRegistrosMesasJson');
Route::post('registro' , 'RegistroMesasController@storeRegistroMesa');
Route::put('registro/{id}' , 'RegistroMesasController@updateRegistroMesa');
Route::delete('registro/{id}' , 'RegistroMesasController@deleteRegistroMesa');

//////////////////////////////////////////////////////////////////////////////////////////
Route::get('prueba' , 'ClienteController@prueba');