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
    //Inicio de sesion
    Route::post('login', 'AutenticacionController@login');
    //Usuarios
    Route::get('ObtenerUsuarios',  [
        'uses' => 'UsuariosController@obtener_usuarios',
        'as' => 'usuarios',
    ]);
    Route::get('ObtenerUsuario/{id}',  [
        'uses' => 'UsuariosController@obtener_usuario',
        'as' => 'usuario',
    ]);
    Route::post('CrearUsuario',  [
        'uses' => 'UsuariosController@crear_usuario',
        'as' => 'crear.usuario',
    ]);
    Route::post('EliminarUsuario/{id}',  [
        'uses' => 'UsuariosController@eliminar_usuario',
        'as' => 'eliminar.usuario',
    ]);
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
    Route::post('/EditarProyecto/{id}', [
        'uses' => 'ProyectosController@editar_proyecto',
        'as' => 'editar.proyecto',
    ]);
    Route::get('ObtenerEstimado/{id}',  [
        'uses' => 'ProyectosController@obtener_estimado',
        'as' => 'proyecto.estimado',
    ]);
    Route::post('/PublicarProyecto/{proyecto}/{etapa}', [
        'uses' => 'ProyectosController@publicar_proyecto',
        'as' => 'publicar.proyecto',
    ]);
    //reportes
    Route::post('GenerarReporte/{tipo}',  [
        'uses' => 'ReportesController@reporte',
        'as' => 'imprimir.reporte',
    ]);
        Route::get('ImprimReporte/{tipo}',  [
            'uses' => 'ReportesController@imprimir_reporte',
            'as' => 'imprimirs.reporte',
        ]);
    //encargados
    Route::post('/CrearEncargados', [
        'uses' => 'EncargadosController@crear_encargado',
        'as' => 'crear.encargado',
    ]);
    Route::post('/EditarEncargado/{id}', [
        'uses' => 'EncargadosController@editar_encargado',
        'as' => 'editar.encargado',
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
    Route::post('EliminarEncargado/{id}',  [
        'uses' => 'EncargadosController@eliminar_encargado',
        'as' => 'eliminar.encargado',
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
    //observaciones
    Route::post('/CrearObservacionSolicitud/{id}', [
        'uses' => 'ObservacionesController@crear_observacion_solicitud',
        'as' => 'crear.observacion',
    ]);
    Route::post('/CrearObservacionProyecto/{id}', [
        'uses' => 'ObservacionesController@crear_observacion_proyecto',
        'as' => 'crear.observacion',
    ]);
    Route::post('/CrearObservacionEncargado/{id}', [
        'uses' => 'ObservacionesController@crear_observacion_encargado',
        'as' => 'crear.observacion',
    ]);
    Route::get('ObtenerObservaciones',  [
        'uses' => 'ObservacionesController@obtener_observaciones',
        'as' => 'observaciones',
    ]);
    //solicitudes
    Route::post('/CrearSolicitud', [
        'uses' => 'SolicitudesController@crear_solicitud',
        'as' => 'crear.solicitud',
    ]);
    Route::post('/EditarSolicitud/{id}', [
        'uses' => 'SolicitudesController@editar_solicitud',
        'as' => 'editar.solicitud',
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

    Route::post('EliminarSolicitud/{id}',  [
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
    Route::post('RevisarAdjunto/{proyecto}/{etapa}',  [
        'uses' => 'AdjuntosController@revisar_adjunto',
        'as' => 'revisar.adjunto',
    ]);

    Route::post('CargarImagen/{etapa}/{id}',  [
        'uses' => 'AdjuntosController@cargar_imagen',
        'as' => 'crear.imagen',
    ]);
    Route::get('descargar/{id}',  [
        'uses' => 'AdjuntosController@descargar_adjunto',
        'as' => 'descargar',
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
    Route::post('SolicitudesEstado/',  [
        'uses' => 'ContadorController@solicitudes_estado',
        'as' => 'etapa',
    ]);
    Route::post('SolicitudesTipo/',  [
        'uses' => 'ContadorController@solicitudes_tipo',
        'as' => 'etapa',
    ]);
    Route::post('SolicitudesUsuarioCliente/',  [
        'uses' => 'ContadorController@solicitudes_proyectos_usuario_cliente',
        'as' => 'etapa',
    ]);
    Route::post('ProyectosUsuarioCliente/',  [
        'uses' => 'ContadorController@proyectos_usuario_cliente',
        'as' => 'etapa',
    ]);
    Route::post('ProyectosGenerales/',  [
        'uses' => 'ContadorController@proyectos_generales',
        'as' => 'etapa',
    ]);
});
