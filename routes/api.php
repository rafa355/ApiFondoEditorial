<?php

use Illuminate\Http\Request;

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

Route::namespace("Api")->group(function(){
 

    Route::get('ObtenetProyectos',  [
        'uses' => 'ProyectosController@obtener_proyectos',
        'as' => 'proyectos',
    ]);

    Route::get('ObtenetProyecto/{id}',  [
        'uses' => 'ProyectosController@obtener_proyecto',
        'as' => 'proyecto',
    ]);

    Route::get('ObtenerEncargados',  [
        'uses' => 'EncargadosController@obtener_encargados',
        'as' => 'encargados',
    ]);
    

    Route::get('ObtenerEncargado/{id}',  [
        'uses' => 'EncargadosController@obtener_encargado',
        'as' => 'encargado',
    ]);
});
