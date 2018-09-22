<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Proyecto;
use App\Modelos\ProyectoType;
use App\Modelos\EtapaProyecto;

class ProyectosController extends Controller
{
    public function obtener_tipos_proyectos(){
    	return response()->json(ProyectoType::all());
    }
    public function obtener_proyectos(){
        
        $now = new \DateTime();
        $proyectos =  Proyecto::with('solicitudes')->get();
        foreach($proyectos as $proyecto){
            //si no ha terminado el proceso sigue contando el tiempo que transcurre
            $no_terminado = EtapaProyecto::where('etapa_type_id',3)->where('status',2)->where('proyecto_id',$proyecto->id)->first();
            if(empty($no_terminado)){
                $fecha = EtapaProyecto::where('etapa_type_id',1)->where('proyecto_id',$proyecto->id)->first();
                if(!empty($fecha)){
                    $fechaF = $fecha->created_at->diff($now);
                    $tiempo_transcurrido = Proyecto::find($proyecto->id)->update(['tiempo_transcurrido_total' => $fechaF->format("%D:%H:%I:%S")]);
                }
            }
        }
    	return response()->json(Proyecto::Proyectos());
    }

    public function obtener_proyecto($id){
    	return response()->json(Proyecto::with('proyectotype')->find($id));
    }
}
