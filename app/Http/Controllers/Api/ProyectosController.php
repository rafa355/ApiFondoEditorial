<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Proyecto;
use App\Modelos\ProyectoType;
use App\Modelos\EtapaProyecto;
use App\Modelos\Observacion;
use App\Modelos\Adjunto;

use Mail;
use App\Mail\Notificaciones;

class ProyectosController extends Controller
{
    public function obtener_tipos_proyectos(){
    	return response()->json(ProyectoType::where('status','activo')->orderby('nombre','asc')->get());
    }
    public function obtener_proyectos(){
        
        $now = new \DateTime();
        $proyectos =  Proyecto::with('solicitudes')->get();
        foreach($proyectos as $proyecto){
            //si no ha terminado el proceso sigue contando el tiempo que transcurre
            $no_terminado = EtapaProyecto::where('etapa_type_id',3)->where('status',2)->where('proyecto_id',$proyecto->id)->first();
            if(empty($no_terminado)){
                $fecha = EtapaProyecto::where('etapa_type_id',1)->where('proyecto_id',$proyecto->id)->first();
                if(!empty($fecha)){
                    $fechaF = $fecha->created_at->diff($now);
                    $tiempo_transcurrido = Proyecto::find($proyecto->id)->update(['tiempo_transcurrido_total' => $fechaF->format("%D:%H:%I:%S")]);
                }
            }
        }
    	return response()->json(Proyecto::Proyectos());
    }

    public function obtener_proyecto($id){
    	return response()->json(Proyecto::with('proyectotype')->with('solicitudes')->find($id));
    }

    public function crear_tipo_proyecto(Request $request ){
        $proyecto = ProyectoType::create($request->all());
        Mail::to('rafa350.rr@gmail.com')->send(new Notificaciones('Se registro nuevo tipo de proyecto.'));
    	return response()->json($proyecto);
    }

    public function eliminar_tipo_proyecto($id){
        $tipo = ProyectoType::find($id);
        $tipo->status = 'eliminado';
        $tipo->save();
    	return response()->json('Se Elimino');
    }

    public function editar_proyecto(Request $request, $id ){
        $fecha =explode("T",$request->tiempo_planificado_total);
        $proyecto = Proyecto::find($id)->update(['nombre' => $request->nombre,'autor' => $request->autor,'correo' => $request->correo,'telefono' => $request->telefono,'periodico' => $request->periodico,'proyecto_type_id' => $request->proyecto_type_id,'descripcion' => $request->descripcion,'tiempo_planificado_total' => $fecha[0]]);
        return response()->json($proyecto);
    }

    public function obtener_estimado($id){
        $proyecto = Proyecto::find($id);
        $now = new \DateTime();
        $fechaF = $proyecto->tiempo_planificado_total->diff($now);
    	return response()->json($fechaF);
    }

    public function publicar_proyecto(Request $request, $proyecto, $etapa){
        $proyecto = Proyecto::with('solicitudes')->find($proyecto);
        $etapa_proyecto =  EtapaProyecto::where('etapa_type_id',$etapa)->where('proyecto_id',$proyecto->id)->first();
        $ultimo_adjunto =  Adjunto::where('etapa_proyecto_id',$etapa_proyecto->id)->latest()->first();
        
        $correo = $request->correo;
        $asunto = $request->asunto;
        if($proyecto->solicitudes->publicacion == 'no'){
            $mensaje = $request->mensaje. PHP_EOL .' Para la descarga del archivo se adjunta el siguiente link: '.$request->link.$ultimo_adjunto->id;
            Mail::send('emails.notificaciones',['notificacion'=> $mensaje],function($msj) use($correo,$asunto){
                $msj->subject($asunto);
                $msj->to($correo);
            });
        }else{
            $proyecto->deposito = $request->deposito;
            $proyecto->isbn = $request->isbn;
            $proyecto->link = $request->adjunto;
            $proyecto->save();
            $mensaje = $request->mensaje. PHP_EOL .'Para acceder a esta publicacion en el sistema ingrese al siguiente link: '.$request->adjunto.' Para la descarga del archivo se adjunta el siguiente link: '.$request->link.$ultimo_adjunto->id;
            Mail::send('emails.notificaciones',['notificacion'=> $mensaje],function($msj) use($correo,$asunto){
                $msj->subject($asunto);
                $msj->to($correo);
            });
        }
        $observacion = Observacion::create([
            'titulo' => 'Publicacion de Proyecto '.$proyecto->nombre,
            'observacion' => $mensaje,
        ]);
    	return response()->json($ultimo_adjunto);
    }
}
