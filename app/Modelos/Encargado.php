<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use DB;
class Encargado extends Model
{
    protected $table = 'encargados';

    protected $fillable = [
        'nombre', 
    ];

    public static function Consulta(){
        $features = DB::table('encargados')
            ->select('id','nombre','created_at')
            ->get();    
        return $features;
      }
}
