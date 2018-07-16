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

    Route::get('ObtenerSolicitantes',  [
        'uses' => 'SolicitantesController@obtener_solicitantes',
        'as' => 'solicitantes',
    ]);

    Route::get('ObtenerTiposProyectos',  [
        'uses' => 'ProyectosController@obtener_tipos_proyectos',
        'as' => 'tipos_proyectos',
    ]);
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

    Route::post('/CrearSolicitud', [
        'uses' => 'SolicitudesController@crear_solicitud',
        'as' => 'crear.solicitud',
    ]);
    
    Route::get('ObtenerSolicitudes',  [
        'uses' => 'SolicitudesController@obtener_solicitudes',
        'as' => 'solicitudes',
    ]);

    Route::get('ObtenerSolicitud/{id}',  [
        'uses' => 'SolicitudesController@obtener_solicitud',
        'as' => 'solicitud',
    ]);

    Route::get('ActivarSolicitud/{id}',  [
        'uses' => 'SolicitudesController@activar_solicitud',
        'as' => 'activar.solicitud',
    ]);

    Route::get('ObtenerAdjuntos/{etapa}/{id}',  [
        'uses' => 'EtapasController@obtener_adjuntos_etapa',
        'as' => 'adjuntos',
    ]);

    Route::get('ObtenerEtapa/{etapa}/{id}',  [
        'uses' => 'EtapasController@obtener_etapa',
        'as' => 'etapa',
    ]);
});
