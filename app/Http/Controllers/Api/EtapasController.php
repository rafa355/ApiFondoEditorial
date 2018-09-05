<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\EtapaProyecto;
use App\Modelos\Adjunto;

class EtapasController extends Controller
{
    public function obtener_adjuntos_etapa($etapa,$id){
        $etapa_proyecto = EtapaProyecto::where('proyecto_id',$id)->where('etapa_type_id',$etapa)->first();
        if($etapa_proyecto){
            return response()->json(Adjunto::where('etapa_proyecto_id',$etapa_proyecto->id)->with('comentarios')->orderBy('created_at', 'desc')->get());
        }
    }

    public function obtener_etapa($etapa,$id){
    	return response()->json(EtapaProyecto::Consulta_etapa($etapa,$id));
    }

    public function activar_etapa($etapa,$proyecto){

        $etapa_proyecto =  EtapaProyecto::create([
            'etapa_type_id' => $etapa,
            'proyecto_id' => $proyecto,
        ]);

    	return response()->json($etapa_proyecto);
    }
}
