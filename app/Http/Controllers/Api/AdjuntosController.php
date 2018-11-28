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
            'contenido' => $request->comentario,
            'adjunto_id' => $id,
        ]);

    	return response()->json($comentario);
    }

    public function cargar_imagen(Request $request,$etapa,$id){
        $etapa_proyecto = EtapaProyecto::where('proyecto_id',$id)->where('etapa_type_id',$etapa)->first();
        $imagen_nombre = $_FILES['imagenPropia']['name']; 
        $directorio_final = public_path('archivos/').$imagen_nombre;  
        $ultimo_adjunto =  Adjunto::where('etapa_proyecto_id',$etapa_proyecto->id)->latest()->first();

        if(isset($_FILES['imagenPropia'])){
          if(move_uploaded_file($_FILES['imagenPropia']['tmp_name'],$directorio_final )){
            if($etapa== 2){
                if($ultimo_adjunto->status == 3 || $ultimo_adjunto->status == 1 ){
                $adjunto = Adjunto::create([
                    'ubicacion' => $directorio_final,
                    'etapa_proyecto_id' => $etapa_proyecto->id,
                    'status' => 2,
                ]);
                $etapa_proyecto->status = 3;
                $etapa_proyecto->save();
                }else{
                    $adjunto = Adjunto::create([
                        'ubicacion' => $directorio_final,
                        'etapa_proyecto_id' => $etapa_proyecto->id,
                        'status' => 3,
                    ]);
                    $etapa_proyecto->status = 1;
                    $etapa_proyecto->save();
                }
            }else{
                $adjunto = Adjunto::create([
                    'ubicacion' => $directorio_final,
                    'etapa_proyecto_id' => $etapa_proyecto->id,
                ]);
            }

            return response()->json($adjunto->id);
            }else{
                return response()->json("que va");
            }
        }
    }
    public function descargar_adjunto($id){
        $adjunto = Adjunto::find($id);
        return response()->download($adjunto->ubicacion );
    }

    public function revisar_adjunto(Request $request,$proyecto,$etapa){

        $etapa_proyecto =  EtapaProyecto::where('etapa_type_id',$etapa)->where('proyecto_id',$proyecto)->first();
        $etapa_proyecto->status = 1;
        $etapa_proyecto->save();
        $ultimo_adjunto =  Adjunto::where('etapa_proyecto_id',$etapa_proyecto->id)->latest()->first();

        //se guarda el nuevo adjunto con los datos del ultimo
        $nuevo_adjunto = Adjunto::create([
            'ubicacion' => $ultimo_adjunto->ubicacion,
            'etapa_proyecto_id' => $etapa_proyecto->id,
            'status' => 3,
        ]);

        $nuevo_comentario = Comentarios::create([
            'contenido' => $request->comentario,
            'adjunto_id' => $nuevo_adjunto->id,
        ]);

        return response()->json('revisado');
    }

}
