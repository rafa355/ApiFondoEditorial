<?php

namespace App\Modelos;
use App\Modelos\Proyecto;

use Illuminate\Database\Eloquent\Model;
use DB;
class datos_proyectos {
    public $ninguna;
    public $todas;
    public $preliminar;
    public $diagramacion;
    public $publicacion;
    public $listos;
}
class Proyecto extends Model
{
    protected $table = 'proyectos';

    protected $fillable = [
        'nombre','descripcion','proyecto_type_id','solicitud_id','tiempo_planificado_total','tiempo_transcurrido_total','autor','telefono','correo','etapa','periodico','deposito','isbn','link','imagen','finalizado'
    ];

    public static function Proyectos(){
        $proyectos = new datos_proyectos();
        $proyectos->ninguna = DB::table('solicitudes')
            ->select('proyectos.id','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.tiempo_real_total as tiempo_real','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->where('solicitudes.status','=','activa')
            ->where('proyectos.etapa','=','ninguna')
            ->get();
            $proyectos->todas = DB::table('solicitudes')
            ->select('proyectos.id','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.tiempo_real_total as tiempo_real','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->where('solicitudes.status','=','activa')
            ->get();
        $proyectos->preliminar = DB::table('solicitudes')
            ->select('proyectos.id','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.tiempo_real_total as tiempo_real','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->where('solicitudes.status','=','activa')
            ->where('proyectos.etapa','=','Preliminar')
            ->get();
        $proyectos->diagramacion = DB::table('solicitudes')
            ->select('proyectos.id','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.tiempo_real_total as tiempo_real','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->where('solicitudes.status','=','activa')
            ->where('proyectos.etapa','=','Diagramacion')
            ->get();
        $proyectos->publicacion = DB::table('solicitudes')
            ->select('proyectos.id','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.tiempo_real_total as tiempo_real','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->where('solicitudes.status','=','activa')
            ->where('proyectos.etapa','=','Publicado')
            ->get();
        return $proyectos;
      }
      public static function Proyectos_por_fecha($rango_bajo,$rango_alto){
        $proyectos = new datos_proyectos();
        $proyectos->ninguna = DB::table('solicitudes')
            ->select('solicitudes.telefono as telefono_cliente','solicitudes.correo as correo_cliente','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.deposito','proyectos.isbn','proyectos.link','proyectos.id','solicitantes.nombre as cliente','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.tiempo_real_total as tiempo_real','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->leftJoin('solicitantes', 'solicitudes.solicitante_id', '=', 'solicitantes.id')
            ->where('solicitudes.status','=','activa')
            ->where('proyectos.etapa','=','ninguna')
            ->whereBetween('proyectos.created_at', array($rango_bajo, $rango_alto))
            ->get();
            $proyectos->todas = DB::table('solicitudes')
            ->select('solicitudes.telefono as telefono_cliente','solicitudes.correo as correo_cliente','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.deposito','proyectos.isbn','proyectos.link','proyectos.id','solicitantes.nombre as cliente','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.tiempo_real_total as tiempo_real','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->leftJoin('solicitantes', 'solicitudes.solicitante_id', '=', 'solicitantes.id')
            ->where('solicitudes.status','=','activa')
            ->whereBetween('proyectos.created_at', array($rango_bajo, $rango_alto))
            ->get();
        $proyectos->preliminar = DB::table('solicitudes')
            ->select('solicitudes.telefono as telefono_cliente','solicitudes.correo as correo_cliente','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.deposito','proyectos.isbn','proyectos.link','proyectos.id','solicitantes.nombre as cliente','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.tiempo_real_total as tiempo_real','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->leftJoin('solicitantes', 'solicitudes.solicitante_id', '=', 'solicitantes.id')
            ->where('solicitudes.status','=','activa')
            ->where('proyectos.etapa','=','Preliminar')
            ->whereBetween('proyectos.created_at', array($rango_bajo, $rango_alto))
            ->get();
        $proyectos->diagramacion = DB::table('solicitudes')
            ->select('solicitudes.telefono as telefono_cliente','solicitudes.correo as correo_cliente','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.deposito','proyectos.isbn','proyectos.link','proyectos.id','solicitantes.nombre as cliente','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.tiempo_real_total as tiempo_real','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->leftJoin('solicitantes', 'solicitudes.solicitante_id', '=', 'solicitantes.id')
            ->where('solicitudes.status','=','activa')
            ->where('proyectos.etapa','=','Diagramacion')
            ->whereBetween('proyectos.created_at', array($rango_bajo, $rango_alto))
            ->get();
        $proyectos->publicacion = DB::table('solicitudes')
            ->select('solicitudes.telefono as telefono_cliente','solicitudes.correo as correo_cliente','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.deposito','proyectos.isbn','proyectos.link','proyectos.id','solicitantes.nombre as cliente','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.tiempo_real_total as tiempo_real','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->leftJoin('solicitantes', 'solicitudes.solicitante_id', '=', 'solicitantes.id')
            ->where('solicitudes.status','=','activa')
            ->where('proyectos.etapa','=','Publicado')
            ->whereBetween('proyectos.created_at', array($rango_bajo, $rango_alto))
            ->get();

        $proyectos->listos = DB::table('solicitudes')
            ->select('solicitudes.telefono as telefono_cliente','solicitudes.correo as correo_cliente','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.deposito','proyectos.isbn','proyectos.link','proyectos.id','solicitantes.nombre as cliente','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.tiempo_real_total as tiempo_real','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->leftJoin('solicitantes', 'solicitudes.solicitante_id', '=', 'solicitantes.id')
            ->where('solicitudes.status','=','activa')
            ->where('proyectos.etapa','=','Publicado')
            ->whereBetween('proyectos.created_at', array($rango_bajo, $rango_alto))
            ->get();
        return $proyectos;
      }
    public function Solicitudes()
    {
        return $this->BelongsTo('App\Modelos\Solicitudes','solicitud_id');
    }
    public function proyectotype()
    {
        return $this->BelongsTo('App\Modelos\ProyectoType','proyecto_type_id');
    }
    public function responsable()
	{
	 	return $this->hasone('App\Modelos\ResponsableProyecto');
	}
}
