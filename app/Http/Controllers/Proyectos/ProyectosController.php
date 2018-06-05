<?php

namespace App\Http\Controllers\Proyectos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Proyecto;

class ProyectosController extends Controller
{
    public function obtener_proyectos(){
    	return response()->json(Proyecto::Consulta());
    }
}
