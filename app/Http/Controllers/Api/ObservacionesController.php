<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Observacion;
use App\Modelos\Solicitudes;
use App\Modelos\Proyecto;
use App\Modelos\Responsable;

class ObservacionesController extends Controller
{
    public function crear_observacion_solicitud(Request $request,$id ){
        $solicitud = Solicitudes::find($id);
        $observacion = Observacion::create([
            'actualizacion' => $request->actualizacion,
            'titulo' => 'Edicion de Solicitud '.$solicitud->nombre,
            'observacion' => $request->observacion,
        ]);
        //Mail::to('rafa350.rr@gmail.com')->send(new Notificaciones('Se registro nueva observacion.'));
    	return response()->json($observacion);
    }
    public function crear_observacion_proyecto(Request $request,$id ){
        $proyecto = Proyecto::find($id);
        $observacion = Observacion::create([
            'actualizacion' => $request->actualizacion,
            'titulo' => 'Edicion de Proyecto '.$proyecto->nombre,
            'observacion' => $request->observacion,
        ]);
        //Mail::to('rafa350.rr@gmail.com')->send(new Notificaciones('Se registro nueva observacion.'));
    	return response()->json($observacion);
    }
    public function crear_observacion_encargado(Request $request,$id ){
        $responsable = Responsable::find($id);
        $observacion = Observacion::create([
            'actualizacion' => $request->actualizacion,
            'titulo' => 'Edicion de Diseñador '.$responsable->nombre,
            'observacion' => $request->observacion,
        ]);
        //Mail::to('rafa350.rr@gmail.com')->send(new Notificaciones('Se registro nueva observacion.'));
    	return response()->json($observacion);
    }
    public function obtener_observaciones(){
    	return response()->json(Observacion::orderby('created_at','desc')->get());
    }
}
