<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use DB;
class Proyecto extends Model
{
    protected $table = 'proyectos';

    protected $fillable = [
        'nombre', 
    ];

    public static function Consulta(){
        $features = DB::table('solicitudes')
            ->select('proyectos.id as id','proyecto_type.nombre AS tipo','solicitudes.nombre AS nombre','proyectos.created_at AS created_at','responsables.nombre AS responsable')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->leftJoin('proyecto_type', 'solicitudes.proyecto_type_id', '=', 'proyecto_type.id')
            ->get();    
        return $features;
      }

      public static function Consulta_proyecto($id){
        $features = DB::table('solicitudes')
            ->select('proyectos.id as id','proyecto_type.nombre AS tipo','solicitudes.nombre AS nombre','proyectos.created_at AS created_at','responsables.nombre AS responsable')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->leftJoin('proyecto_type', 'solicitudes.proyecto_type_id', '=', 'proyecto_type.id')
            ->where('solicitudes.id','=',$id)  
            ->get();    
        return $features;
      }
}
