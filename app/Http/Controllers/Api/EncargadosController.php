<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Responsable;

class EncargadosController extends Controller
{
    public function obtener_encargados(){
    	return response()->json(Responsable::Consulta());
    }

    public function obtener_encargado($id){
    	return response()->json(Responsable::find($id));
    }
}
