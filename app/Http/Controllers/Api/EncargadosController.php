<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Responsable;
use App\Modelos\ResponsableType;

class EncargadosController extends Controller
{
    public function obtener_encargados(){
    	return response()->json(Responsable::with('tipo')->get());
    }

    public function obtener_encargado($id){
    	return response()->json(Responsable::find($id));
    }

    public function obtener_encargados_type(){
    	return response()->json(ResponsableType::all());
    }

    public function crear_encargado(Request $request ){

        $encargado = Responsable::create($request->all());

    	return response()->json($encargado);
    }
}
