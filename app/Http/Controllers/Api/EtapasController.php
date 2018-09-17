<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\EtapaProyecto;
use App\Modelos\Adjunto;
use App\Modelos\Comentarios;

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


    public function consultar_etapa($etapa,$proyecto){

        $etapa_proyecto =  EtapaProyecto::where('etapa_type_id',$etapa)->where('proyecto_id',$proyecto)->first();
    	return response()->json($etapa_proyecto);
    }

    public function activar_etapa($etapa,$proyecto){

        $etapa_proyecto =  EtapaProyecto::create([
            'etapa_type_id' => $etapa,
            'proyecto_id' => $proyecto,
        ]);

    	return response()->json($etapa_proyecto);
    }

    public function finalizar_etapa($etapa,$proyecto){

        $etapa_proyecto =  EtapaProyecto::where('etapa_type_id',$etapa)->where('proyecto_id',$proyecto)->first();
        $etapa_proyecto->status = 2;
        $etapa_proyecto->save();

        $ultimo_adjunto =  Adjunto::where('etapa_proyecto_id',$etapa_proyecto->id)->latest()->first();
        $ultimo_comentario =  Comentarios::where('adjunto_id',$ultimo_adjunto->id)->latest()->first();

        $etapa_proyecto_siguiente =  EtapaProyecto::create([
            'etapa_type_id' => $etapa+1,
            'proyecto_id' => $proyecto,
        ]);

        $nuevo_adjunto = Adjunto::create([
            'ubicacion' => $ultimo_adjunto->ubicacion,
            'etapa_proyecto_id' => $etapa_proyecto_siguiente->id,
        ]);

        $nuevo_comentario = Comentarios::create([
            //ojo aqui es contenido
            'conteido' => $ultimo_comentario->conteido,
            'adjunto_id' => $nuevo_adjunto->id,
        ]);

    	return response()->json($etapa_proyecto_siguiente);
    }
}
