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

/* Noticias */
Route::get('noticias', 'NoticiasController@getNoticias');
/* Contacto via email */
Route::post('contacto', 'ContactoController@automaticFormResponse');
/* Clientes Api */
Route::prefix('clientes')->group(
    function () {
        Route::get('', 'ClienteController@getAllClientes');
        Route::post('', 'ClienteController@store');
        Route::put('/{id}', 'ClienteController@update');
        Route::delete('/{id}', 'ClienteController@destroy');
    }
);
/* Registro de Mesas Api */
Route::prefix('registro')->group(
    function () {
        Route::get('', 'RegistroMesasController@getAllRegistrosMesas');
        Route::post('', 'RegistroMesasController@store');
        Route::put('/{id}', 'RegistroMesasController@update');
        Route::delete('/{id}', 'RegistroMesasController@delete');
    }
);
/* Productos Api */
Route::prefix('productos')->group(
    function () {
        Route::get('', 'ProductoController@getAllProductos');
        Route::post('', 'ProductoController@store');
        Route::put('/{id}', 'ProductoController@update');
        Route::delete('/{id}', 'ProductoController@destroy');
    }
);
/////////////////////////////////////////////////////////////////