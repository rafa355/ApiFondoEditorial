<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Observacion;

class ObservacionesController extends Controller
{
    public function crear_observaciones(Request $request ){
        $Observaciones = Observaciones::create($request->all());
        //Mail::to('rafa350.rr@gmail.com')->send(new Notificaciones('Se registro nuevo solicitante.'));
    	return response()->json($Observaciones);
    }
    public function obtener_observaciones(){
    	return response()->json(Observacion::orderby('created_at','desc')->get());
    }
}
