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
            ->select('id','nombre','created_at')
            ->get();    
        return $features;
      }
    }
