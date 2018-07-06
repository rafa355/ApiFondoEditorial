<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Solicitudes;

class SolicitudesController extends Controller
{
    public function obtener_solicitudes(){
    	return response()->json(Solicitudes::Consulta());
    }

    public function obtener_solicitud($id){
    	return response()->json(Solicitudes::find($id));
    }

    public function crear_solicitud(Request $request ){

        $solicitud = Solicitudes::create($request->all());
    	return response()->json($solicitud);
    }

}
