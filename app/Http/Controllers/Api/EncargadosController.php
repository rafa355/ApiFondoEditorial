<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Encargado;

class EncargadosController extends Controller
{
    public function obtener_encargados(){
    	return response()->json(Encargado::Consulta());
    }

    public function obtener_encargado($id){
    	return response()->json(Encargado::find($id));
    }
}
