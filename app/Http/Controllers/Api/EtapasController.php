<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\EtapaProyecto;
use App\Modelos\Adjunto;
use App\Modelos\Comentarios;
use App\Modelos\Proyecto;

class EtapasController extends Controller
{
    public function obtener_adjuntos_etapa($etapa,$id){
        $etapa_proyecto = EtapaProyecto::where('proyecto_id',$id)->where('etapa_type_id',$etapa)->first();
        if($etapa_proyecto){
            return response()->json(Adjunto::where('etapa_proyecto_id',$etapa_proyecto->id)->with('comentarios')->orderBy('created_at', 'desc')->get());
        }
    }

    public function obtener_etapa($etapa,$id){
        $now = new \DateTime();
        $fecha = EtapaProyecto::where('etapa_type_id',$etapa)->where('proyecto_id',$id)->where('status',1)->first();
        if(!empty($fecha)){$fechaF = $fecha->created_at->diff($now);
            $tiempo_transcurrido = EtapaProyecto::where('etapa_type_id',$etapa)->where('proyecto_id',$id)->update(['tiempo_transcurrido' => $fechaF->format("%D:%H:%I:%S")]);
        }
    	return response()->json(EtapaProyecto::Consulta_etapa($etapa,$id));
    }


    public function consultar_etapa($etapa,$proyecto){

        $etapa_proyecto =  EtapaProyecto::where('etapa_type_id',$etapa)->where('proyecto_id',$proyecto)->first();

    	return response()->json($etapa_proyecto);
    }

    public function activar_etapa(Request $request){
        $estimado = explode("T",$request->estimado);
        $etapa_proyecto =  EtapaProyecto::create([
            'etapa_type_id' => $request->etapa,
            'proyecto_id' => $request->proyecto,
            'tiempo_estimado' => $estimado[0],
        ]);
        $proyecto = Proyecto::find($etapa_proyecto->proyecto_id)->update(['etapa' => 'Preliminar']);
    	return response()->json($etapa_proyecto);
    }

    public function finalizar_etapa(Request $request){
        $estimado = explode("T",$request->estimado);

        $etapa_proyecto =  EtapaProyecto::where('etapa_type_id',$request->etapa)->where('proyecto_id',$request->proyecto)->first();
        $etapa_proyecto->status = 2;
        $etapa_proyecto->save();

        if($request->etapa == 3){
            $proyecto = Proyecto::find($request->proyecto)->update(['etapa' => 'Publicado']);
            return response()->json('Finalizado');
        }else{
        $ultimo_adjunto =  Adjunto::where('etapa_proyecto_id',$etapa_proyecto->id)->latest()->first();
        $ultimo_comentario =  Comentarios::where('adjunto_id',$ultimo_adjunto->id)->latest()->first();

        $etapa_proyecto_siguiente =  EtapaProyecto::create([
            'etapa_type_id' => $request->etapa+1,
            'proyecto_id' => $request->proyecto,
            'tiempo_estimado' => $estimado[0],
        ]);
        //si es etapa preliminar lo lleva a diagramación
        if($request->etapa == 1){
            $proyecto = Proyecto::find($etapa_proyecto_siguiente->proyecto_id)->update(['etapa' => 'Diagramacion']);
        }
        else{
            $proyecto = Proyecto::find($etapa_proyecto_siguiente->proyecto_id)->update(['etapa' => 'Publicado']);
        }
        $nuevo_adjunto = Adjunto::create([
            'ubicacion' => $ultimo_adjunto->ubicacion,
            'etapa_proyecto_id' => $etapa_proyecto_siguiente->id,
        ]);

        $nuevo_comentario = Comentarios::create([
            'contenido' => $ultimo_comentario->contenido,
            'adjunto_id' => $nuevo_adjunto->id,
        ]);

        return response()->json($etapa_proyecto_siguiente);
        }
    }
}
