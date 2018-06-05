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
            ->select('id','nombre','created_at')
            ->get();    
        return $features;
      }

}
