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
    Route::get('ObtenerProyectos',  [
        'uses' => 'ProyectosController@obtener_proyectos',
        'as' => 'proyectos',
    ]);

    Route::get('ObtenerProyecto/{id}',  [
        'uses' => 'ProyectosController@obtener_proyecto',
        'as' => 'proyecto',
    ]);
    //encargados
    Route::post('/CrearEncargados', [
        'uses' => 'EncargadosController@crear_encargado',
        'as' => 'crear.encargado',
    ]);
    Route::get('/AsignarEncargado/{proyecto}/{encargado}', [
        'uses' => 'EncargadosController@asignar_encargado',
        'as' => 'asgnar.encargado',
    ]);
    Route::get('ObtenerEncargados',  [
        'uses' => 'EncargadosController@obtener_encargados',
        'as' => 'encargados',
    ]);
    Route::get('ObtenerPrincipal/{proyecto}',  [
        'uses' => 'EncargadosController@obtener_principal',
        'as' => 'principal',
    ]);
    Route::get('ObtenerEncargado/{id}',  [
        'uses' => 'EncargadosController@obtener_encargado',
        'as' => 'encargado',
    ]);

    Route::get('ObtenerEncargadostype',  [
        'uses' => 'EncargadosController@obtener_encargados_type',
        'as' => 'encargados_type',
    ]);

    //solicitudes
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

    Route::get('EliminarSolicitud/{id}',  [
        'uses' => 'SolicitudesController@eliminar_solicitud',
        'as' => 'activar.solicitud',
    ]);

    //Etapas y Adjuntos
    Route::get('ObtenerAdjuntos/{etapa}/{id}',  [
        'uses' => 'EtapasController@obtener_adjuntos_etapa',
        'as' => 'adjuntos',
    ]);
    Route::post('CrearAdjunto/{id}',  [
        'uses' => 'AdjuntosController@crear_adjunto',
        'as' => 'crear.adjunto',
    ]);

    Route::post('CargarImagen/{etapa}/{id}',  [
        'uses' => 'AdjuntosController@cargar_imagen',
        'as' => 'crear.imagen',
    ]);
    Route::get('ObtenerEtapa/{etapa}/{id}',  [
        'uses' => 'EtapasController@obtener_etapa',
        'as' => 'etapa',
    ]);

    Route::get('ActivarEtapa/{etapa}/{proyecto}',  [
        'uses' => 'EtapasController@activar_etapa',
        'as' => 'etapa',
    ]);

    Route::get('FinalizarEtapa/{etapa}/{proyecto}',  [
        'uses' => 'EtapasController@finalizar_etapa',
        'as' => 'etapa',
    ]);

    Route::get('ConsultarEtapa/{etapa}/{proyecto}',  [
        'uses' => 'EtapasController@consultar_etapa',
        'as' => 'etapa',
    ]);
});
