<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Adjunto;
use App\Modelos\EtapaProyecto;
use App\Modelos\Comentarios;

class AdjuntosController extends Controller
{
    public function crear_adjunto(Request $request,$etapa,$id ){
        
        $etapa_proyecto = EtapaProyecto::where('proyecto_id',$id)->where('etapa_type_id',$etapa)->first();
        $adjunto = Adjunto::create([
            'ubicacion' => $request->ubicacion,
            'etapa_proyecto_id' => $etapa_proyecto->id,
        ]);

        $comentario = Comentarios::create([
            //ojo aqui es contenido
            'conteido' => $request->comentario,
            'adjunto_id' => $adjunto->id,
        ]);

    	return response()->json($adjunto);
    }
}
