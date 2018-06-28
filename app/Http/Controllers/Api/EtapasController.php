<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\EtapaProyecto;

class EtapasController extends Controller
{
    public function obtener_adjuntos_etapa($etapa,$id){
    	return response()->json(EtapaProyecto::Consulta_adjuntos($etapa,$id));
    }

    public function obtener_etapa($etapa,$id){
    	return response()->json(EtapaProyecto::Consulta_etapa($etapa,$id));
    }
}
