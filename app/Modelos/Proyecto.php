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
}
class Proyecto extends Model
{
    protected $table = 'proyectos';

    protected $fillable = [
        'nombre','descripcion','proyecto_type_id','solicitud_id','tiempo_planificado_total','tiempo_transcurrido_total','autor','telefono','correo','etapa','periodico',
    ];

    public static function Proyectos(){
        $proyectos = new datos_proyectos();
        $proyectos->ninguna = DB::table('solicitudes')
            ->select('proyectos.id','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->where('solicitudes.status','=','activa')
            ->where('proyectos.etapa','=','ninguna')
            ->get();
            $proyectos->todas = DB::table('solicitudes')
            ->select('proyectos.id','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->where('solicitudes.status','=','activa')
            ->get();
        $proyectos->preliminar = DB::table('solicitudes')
            ->select('proyectos.id','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->where('solicitudes.status','=','activa')
            ->where('proyectos.etapa','=','Preliminar')
            ->get();
        $proyectos->diagramacion = DB::table('solicitudes')
            ->select('proyectos.id','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->where('solicitudes.status','=','activa')
            ->where('proyectos.etapa','=','Diagramacion')
            ->get();
        $proyectos->publicacion = DB::table('solicitudes')
            ->select('proyectos.id','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo','proyectos.tiempo_planificado_total as fecha_estimada','proyectos.tiempo_transcurrido_total as tiempo_transcurrido','proyectos.autor as autor','proyectos.telefono as telefono','proyectos.correo as correo','proyectos.etapa as etapa')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->where('solicitudes.status','=','activa')
            ->where('proyectos.etapa','=','Publicado')
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
