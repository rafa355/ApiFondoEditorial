<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ProyectoType extends Model
{
    protected $table = 'proyecto_type';

    protected $fillable = [
        'nombre', 
    ];

    
    public static function Consulta(){
        $features = DB::table('car_type_filter')
            ->select('id','name','status','created_at')
            ->where('status', '<', '9')
            ->get();    
        return $features;
      }

      public static function Consulta_Activas(){
        $features = DB::table('car_type_filter')
            ->select('id','name','status','created_at')
            ->where('status', '=', '1')
            ->get();    
        return $features;
      }

      public static function Consulta_Usada($id){
        $dato = DB::table('car_type_filter')
            ->select('id','name','status','created_at')
            ->where('id', '=', $id)
            ->first();    
        return $dato;
      }
    }
