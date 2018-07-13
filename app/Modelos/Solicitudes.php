<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use DB;
class Solicitudes extends Model
{
    protected $table = 'solicitudes';

    protected $fillable = [
        'nombre','publicacion','solicitante_id',
    ];

    public static function Consulta(){
        $features = DB::table('solicitudes')
            ->select('proyecto_type.nombre AS tipo','solicitudes.nombre AS nombre','solicitudes.created_at AS creada','solicitantes.nombre AS solicitante')
            ->leftJoin('proyecto_type', 'solicitudes.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('solicitantes', 'solicitudes.solicitante_id', '=', 'solicitantes.id')
            ->orderBy('solicitudes.created_at','desc')
            ->get();    
        return $features;
      }

}


