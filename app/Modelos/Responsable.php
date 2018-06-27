<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use DB;

class Responsable extends Model
{
    protected $table = 'responsables';

    protected $fillable = [
        'nombre', 
    ];

    public static function Consulta(){
        $features = DB::table('responsables')
            ->select('responsables.nombre as nombre','responsable_type.nombre as tipo')
            ->leftJoin('responsable_type', 'responsables.responsable_type_id', '=', 'responsable_type.id')
            ->get();    
        return $features;
      }
    }
