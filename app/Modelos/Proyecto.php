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
        $features = DB::table('proyectos')
            ->select('proyectos.id as id','proyectos.nombre AS nombre','proyectos.created_at AS created_at','responsables.nombre AS responsable')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->get();    
        return $features;
      }

}
