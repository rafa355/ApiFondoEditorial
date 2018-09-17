<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use DB;
class Proyecto extends Model
{
    protected $table = 'proyectos';

    protected $fillable = [
        'nombre','descripcion','proyecto_type_id','solicitud_id',
    ];

    public static function Proyectos(){
        $features = DB::table('solicitudes')
            ->select('proyectos.id','responsables.nombre as responsable','proyectos.nombre as nombre','proyectos.created_at','proyecto_type.nombre as tipo')
            ->leftJoin('proyectos', 'solicitudes.id', '=', 'proyectos.solicitud_id')
            ->leftJoin('proyecto_type', 'proyectos.proyecto_type_id', '=', 'proyecto_type.id')
            ->leftJoin('responsable_proyecto', 'proyectos.id', '=', 'responsable_proyecto.proyecto_id')
            ->leftJoin('responsables', 'responsable_proyecto.responsable_id', '=', 'responsables.id')
            ->where('solicitudes.status','=','activa')
            ->get();
        return $features;
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
