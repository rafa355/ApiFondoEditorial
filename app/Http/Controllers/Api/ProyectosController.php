<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Proyecto;
use App\Modelos\ProyectoType;

class ProyectosController extends Controller
{
    public function obtener_tipos_proyectos(){
    	return response()->json(ProyectoType::all());
    }
    public function obtener_proyectos(){
    	return response()->json(Proyecto::with('ProyectoType')->get());
    }

    public function obtener_proyecto($id){
    	return response()->json(Proyecto::with('ProyectoType')->find($id));
    }
}
