<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Proyecto;
use App\Modelos\Solicitudes;
use App\Modelos\EtapaProyecto;
use App\Modelos\Solicitante;
use App\Modelos\ProyectoType;
use App\Modelos\Responsable;
use DB;
class datos_solicitudes_usuario_cliente {
    public $todas;
    public $clientes;
    public $usuarios;
}
class datos_solicitudes {
    public $activas;
    public $pendientes;
    public $anuladas;
    public $publicacion;
    public $no_publicacion;
}

class datos_proyectos {
    public $ninguna;
    public $todas;
    public $preliminar;
    public $diagramacion;
    public $publicacion;
    public $listos;
    public $tipo;
    public $diseñador;
    public $autor;
}
class ContadorController extends Controller
{
    public function produccion(){
        $proyectos = Proyecto::Proyectos();
    	return response()->json(count($proyectos->todas));
    }

    public function solicitudes_proyectos_usuario_cliente(Request $request){
        $rango_bajo =explode("T",$request->rango[0]);
        $rango_alto =explode("T",$request->rango[1]);
        $grafia_solicitudes_usuarios = new datos_solicitudes_usuario_cliente();
        $solicitudes = Solicitudes::pluck('solicitante_id');

        $grafia_solicitudes_usuarios->todas = Solicitante::select('solicitantes.nombre',DB::raw('count(s.id) AS solicitudes_count'))
        ->leftJoin('solicitudes AS s', function($join){$join->on('s.solicitante_id', '=', 'solicitantes.id');})
        ->whereIn('solicitantes.id',$solicitudes)
        ->whereBetween('s.created_at', array($rango_bajo[0], $rango_alto[0]))
        ->groupBy('solicitantes.id')
        ->get();
        $grafia_solicitudes_usuarios->clientes = Solicitante::select('solicitantes.nombre',DB::raw('count(s.id) AS solicitudes_count'))
        ->leftJoin('solicitudes AS s', function($join){$join->on('s.solicitante_id', '=', 'solicitantes.id');})
        ->where('solicitante_type_id',1)
        ->whereBetween('s.created_at', array($rango_bajo[0], $rango_alto[0]))
        ->whereIn('solicitantes.id',$solicitudes)
        ->groupBy('solicitantes.id')
        ->get();
        $grafia_solicitudes_usuarios->usuarios = Solicitante::select('solicitantes.nombre',DB::raw('count(s.id) AS solicitudes_count'))
        ->leftJoin('solicitudes AS s', function($join){$join->on('s.solicitante_id', '=', 'solicitantes.id');})
        ->where('solicitante_type_id',2)
        ->whereBetween('s.created_at', array($rango_bajo[0], $rango_alto[0]))
        ->whereIn('solicitantes.id',$solicitudes)
        ->groupBy('solicitantes.id')
        ->get();
        return response()->json($grafia_solicitudes_usuarios);
    }
    //listo
    public function solicitudes_estado(Request $request){
        $rango_bajo =explode("T",$request->rango[0]);
        $rango_alto =explode("T",$request->rango[1]);
        $solicitudes = new datos_solicitudes();
        $solicitudes->activas = Solicitudes::where('status','activa')->whereBetween('created_at', array($rango_bajo[0], $rango_alto[0]))->count();
        $solicitudes->pendientes = Solicitudes::where('status','pendiente')->whereBetween('created_at', array($rango_bajo[0], $rango_alto[0]))->count();
        $solicitudes->anuladas = Solicitudes::where('status','eliminada')->whereBetween('created_at', array($rango_bajo[0], $rango_alto[0]))->count();
    	return response()->json($solicitudes);
    }
    //listo
    public function solicitudes_tipo(Request $request){
        $rango_bajo =explode("T",$request->rango[0]);
        $rango_alto =explode("T",$request->rango[1]);
        $solicitudes = new datos_solicitudes();
        $solicitudes->publicacion = Solicitudes::where('publicacion','si')->whereBetween('created_at', array($rango_bajo[0], $rango_alto[0]))->count();
        $solicitudes->no_publicacion = Solicitudes::where('publicacion','no')->whereBetween('created_at', array($rango_bajo[0], $rango_alto[0]))->count();
    	return response()->json($solicitudes);
    }
    //listo
    public function proyectos_usuario_cliente(Request $request){
        $rango_bajo =explode("T",$request->rango[0]);
        $rango_alto =explode("T",$request->rango[1]);
        $grafia_proyectos = new datos_solicitudes_usuario_cliente();
        $solicitudes = Solicitudes::pluck('solicitante_id');

        $grafia_proyectos->todas = Solicitante::select('solicitantes.nombre',DB::raw('count(p.id) AS proyectos'))
        ->leftJoin('solicitudes', 'solicitantes.id', '=', 'solicitudes.solicitante_id')
        ->leftJoin('proyectos AS p', function($join){
            $join->on('p.solicitud_id', '=', 'solicitudes.id');})
        ->whereIn('solicitantes.id',$solicitudes)
        ->whereBetween('p.created_at', array($rango_bajo[0], $rango_alto[0]))
        ->groupBy('solicitantes.id')
        ->get();
        $grafia_proyectos->clientes = Solicitante::select('solicitantes.nombre',DB::raw('count(p.id) AS proyectos'))
        ->leftJoin('solicitudes', 'solicitantes.id', '=', 'solicitudes.solicitante_id')
        ->leftJoin('proyectos AS p', function($join){
            $join->on('p.solicitud_id', '=', 'solicitudes.id');})
        ->whereIn('solicitantes.id',$solicitudes)
        ->whereBetween('p.created_at', array($rango_bajo[0], $rango_alto[0]))
        ->where('solicitante_type_id',1)
        ->groupBy('solicitantes.id')
        ->get();
        $grafia_proyectos->usuarios = Solicitante::select('solicitantes.nombre',DB::raw('count(p.id) AS proyectos'))
        ->leftJoin('solicitudes', 'solicitantes.id', '=', 'solicitudes.solicitante_id')
        ->leftJoin('proyectos AS p', function($join){
            $join->on('p.solicitud_id', '=', 'solicitudes.id');})
        ->whereIn('solicitantes.id',$solicitudes)
        ->whereBetween('p.created_at', array($rango_bajo[0], $rango_alto[0]))
        ->where('solicitante_type_id',2)
        ->groupBy('solicitantes.id')
        ->get();
    	return response()->json($grafia_proyectos);
    }
    public function proyectos_generales(Request $request){
        $rango_bajo =explode("T",$request->rango[0]);
        $rango_alto =explode("T",$request->rango[1]);
        $proyectosActivos = Proyecto::pluck('proyecto_type_id');
        $proyectos = new datos_proyectos();

        $proyectos->tipo = ProyectoType::select('proyecto_type.nombre',DB::raw('count(p.id) AS proyecto_count'))
        ->leftJoin('proyectos AS p', function($join){
            $join->on('p.proyecto_type_id', '=', 'proyecto_type.id');})
        ->whereIn('proyecto_type.id',$proyectosActivos)
        ->where('proyecto_type.status','activo')
        ->whereBetween('p.created_at', array($rango_bajo[0], $rango_alto[0]))
        ->groupBy('proyecto_type.id')
        ->get();
        
        $proyectos->ninguna = Proyecto::where('etapa','Ninguna')->whereBetween('created_at', array($rango_bajo[0], $rango_alto[0]))->count();
        $proyectos->preliminar = Proyecto::where('etapa','Preliminar')->whereBetween('created_at', array($rango_bajo[0], $rango_alto[0]))->count();
        $proyectos->diagramacion = Proyecto::where('etapa','Diagramacion')->whereBetween('created_at', array($rango_bajo[0], $rango_alto[0]))->count();
        $proyectos->publicacion = Proyecto::where('etapa','Publicado')->whereBetween('created_at', array($rango_bajo[0], $rango_alto[0]))->count();
        $proyectos->listos = Proyecto::where('etapa','Publicado')->whereBetween('created_at', array($rango_bajo[0], $rango_alto[0]))->count();
        
        $proyectos->diseñador = Responsable::select('responsables.nombre',DB::raw('count(p.id) AS proyectos'))
        ->leftJoin('responsable_proyecto', 'responsables.id', '=', 'responsable_proyecto.responsable_id')
        ->leftJoin('proyectos AS p', function($join){
            $join->on('p.id', '=', 'responsable_proyecto.proyecto_id');})
        ->where('status','activo')
        ->whereBetween('p.created_at', array($rango_bajo[0], $rango_alto[0]))
        ->groupBy('responsables.id')
        ->get();
        
        $proyectos->autor = Proyecto::select('proyectos.autor',DB::raw('count(p.id) AS proyectos'))
        ->leftJoin('proyectos AS p', function($join){
            $join->on('p.id', '=', 'proyectos.id');})
        ->groupBy('proyectos.autor')
        ->whereBetween('p.created_at', array($rango_bajo[0], $rango_alto[0]))
        ->get();
    	return response()->json($proyectos);
    }
}
