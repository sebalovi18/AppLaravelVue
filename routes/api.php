<?php

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
Route::post('contacto' , 'ContactoController@automaticFormResponse');

/* Clientes Api */
Route::get('clientes','ClienteController@getAllClientes');
Route::post('clientes','ClienteController@store');
Route::put('clientes/{id}','ClienteController@update');
Route::delete('clientes/{id}','ClienteController@destroy');

/* Registro de Mesas Api */
Route::get('registro' , 'RegistroMesasController@getAllRegistrosMesas');
Route::post('registro' , 'RegistroMesasController@store');
Route::put('registro/{id}' , 'RegistroMesasController@update');
Route::delete('registro/{id}' , 'RegistroMesasController@delete');

/* Productos Api */
Route::get('productos', 'ProductoController@getAllProductos');
Route::post('productos' , 'ProductoController@store');
Route::put('productos/{id}', 'ProductoController@update');
Route::delete('producto/{id}', 'ProductoController@destroy');

/////////////////////////////////////////////////////////////////
Route::get('pruebas', function(){

});