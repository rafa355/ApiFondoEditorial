<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Solicitudes;
use App\Modelos\Proyecto;

class SolicitudesController extends Controller
{
    public function obtener_solicitudes(){
    	return response()->json(Solicitudes::all());
    }

    public function obtener_solicitud($id){
    	return response()->json(Solicitudes::find($id));
    }

    public function crear_solicitud(Request $request ){

        $solicitud = Solicitudes::create($request->all());

        //dd($solicitud->id);
        foreach($request->proyectos as $proyecto){
            $proyect = Proyecto::create($proyecto);
            $proyect->solicitud_id = 4;
            $proyect->save();
        }

    	return response()->json($solicitud);
    }

}
