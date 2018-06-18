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
            ->select('proyectos.id as id','proyectos.nombre AS nombre','proyectos.created_at AS created_at','encargados.nombre AS encargado')
            ->leftJoin('encargados', 'proyectos.encargado_id', '=', 'encargados.id')
            ->get();    
        return $features;
      }

}
