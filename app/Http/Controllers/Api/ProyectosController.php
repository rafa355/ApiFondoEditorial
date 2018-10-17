<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Proyecto;
use App\Modelos\ProyectoType;
use App\Modelos\EtapaProyecto;

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
    	return response()->json(Proyecto::with('proyectotype')->find($id));
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

    public function reporte(){
        $reporte = Proyecto::Proyectos();
        $pdf = \PDF::loadView('pdf.prueba',['reporte' => $reporte]);
        return $pdf->download('archivo.pdf');
    }
}
