<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Solicitudes;
use App\Modelos\Proyecto;

class SolicitudesController extends Controller
{
    public function obtener_solicitudes(){
    	return response()->json(Solicitudes::where('status','!=','eliminada')->with('solicitante')->with('Proyecto')->get());
    }

    public function obtener_solicitud($id){
    	return response()->json(Solicitudes::with('proyecto','proyecto.proyectotype')->with('solicitante')->find($id));
    }

    public function activar_solicitud($id){
        $solicitud = Solicitudes::find($id);
        $solicitud->status = 'activa';
        $solicitud->save();
    	return response()->json('Se activo la solicitud');
    }

    public function eliminar_solicitud($id){
        $solicitud = Solicitudes::find($id);
        $solicitud->status = 'eliminada';
        $solicitud->save();
    	return response()->json('Se activo la solicitud');
    }
    public function crear_solicitud(Request $request ){

        $solicitud = Solicitudes::create($request->all());

        foreach($request->proyectos as $proyecto){
            $fecha =explode("T",$proyecto['tiempo_planificado_total']);
            $proyect = Proyecto::create([
                'nombre' => $proyecto['nombre'],
                'descripcion' => $proyecto['descripcion'],
                'proyecto_type_id' => $proyecto['proyecto_type_id'],
                'solicitud_id' => $solicitud->id,
                'tiempo_planificado_total' => $fecha[0],
            ]);
        }

    	return response()->json($solicitud);
    }

}
