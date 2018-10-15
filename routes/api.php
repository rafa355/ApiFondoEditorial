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
    //solicitantes
    Route::get('ObtenerSolicitantes',  [
        'uses' => 'SolicitantesController@obtener_solicitantes',
        'as' => 'solicitantes',
    ]);

    Route::post('/CrearSolicitante', [
        'uses' => 'SolicitantesController@crear_solicitante',
        'as' => 'crear.solicitante',
    ]);

    Route::get('EliminarSolicitante/{id}',  [
        'uses' => 'SolicitantesController@eliminar_solicitante',
        'as' => 'eliminar.solicitante',
    ]);
    Route::post('/CrearTipoProyecto', [
        'uses' => 'ProyectosController@crear_tipo_proyecto',
        'as' => 'crear.tipo',
    ]);
    Route::get('ObtenerTiposProyectos',  [
        'uses' => 'ProyectosController@obtener_tipos_proyectos',
        'as' => 'tipos_proyectos',
    ]);
    Route::get('EliminarTipoProyecto/{id}',  [
        'uses' => 'ProyectosController@eliminar_tipo_proyecto',
        'as' => 'eliminar.tipo',
    ]);
    Route::get('ObtenerProyectos',  [
        'uses' => 'ProyectosController@obtener_proyectos',
        'as' => 'eliminar.tipos',
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
    //Proyecciones
    Route::get('ObtenerProyecciones',  [
        'uses' => 'SolicitudesController@obtener_proyecciones',
        'as' => 'proyecciones',
    ]);
    Route::post('/EnviarMensaje', [
        'uses' => 'SolicitudesController@enviar_mensaje',
        'as' => 'enviar.mensaje',
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

    Route::post('ActivarSolicitud/{id}',  [
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

    Route::post('ActivarEtapa/',  [
        'uses' => 'EtapasController@activar_etapa',
        'as' => 'etapa',
    ]);

    Route::post('FinalizarEtapa/',  [
        'uses' => 'EtapasController@finalizar_etapa',
        'as' => 'etapa',
    ]);

    Route::get('ConsultarEtapa/{etapa}/{proyecto}',  [
        'uses' => 'EtapasController@consultar_etapa',
        'as' => 'etapa',
    ]);

    //Contadores
    Route::get('ProduccionTotal/',  [
        'uses' => 'ContadorController@produccion',
        'as' => 'etapa',
    ]);
    Route::get('EnPreliminar/',  [
        'uses' => 'ContadorController@preliminar',
        'as' => 'etapa',
    ]);
    Route::get('EnDiagramacion/',  [
        'uses' => 'ContadorController@diagramacion',
        'as' => 'etapa',
    ]);
    Route::get('EnPublicacion/',  [
        'uses' => 'ContadorController@publicacion',
        'as' => 'etapa',
    ]);

});
