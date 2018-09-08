<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Adjunto;
use App\Modelos\EtapaProyecto;
use App\Modelos\Comentarios;

class AdjuntosController extends Controller
{
    public function crear_adjunto(Request $request,$id ){

        $comentario = Comentarios::create([
            //ojo aqui es contenido
            'conteido' => $request->comentario,
            'adjunto_id' => $id,
        ]);

    	return response()->json($comentario);
    }

    public function cargar_imagen(Request $request,$etapa,$id){
        $etapa_proyecto = EtapaProyecto::where('proyecto_id',$id)->where('etapa_type_id',$etapa)->first();
        $imagen_nombre = $_FILES['imagenPropia']['name']; 
        $directorio_final = public_path('archivos/').$imagen_nombre;  

        if(isset($_FILES['imagenPropia'])){
          if(move_uploaded_file($_FILES['imagenPropia']['tmp_name'],$directorio_final )){
            $adjunto = Adjunto::create([
                'ubicacion' => $directorio_final,
                'etapa_proyecto_id' => $etapa_proyecto->id,
            ]);
            return response()->json($adjunto->id);
            }else{
                return response()->json("que va");
            }
        }
    }



}
