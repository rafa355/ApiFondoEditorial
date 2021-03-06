<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Solicitudes;
use App\Modelos\Proyecto;
use App\Modelos\Proyeccion;
use App\Modelos\Observacion;

use Mail;
use App\Mail\Notificaciones;
class SolicitudesController extends Controller
{
    public function obtener_solicitudes(){
    	return response()->json(Solicitudes::where('status','!=','eliminada')->with('solicitante')->with('Proyecto')->get());
    }

    public function obtener_solicitud($id){
        $resultado = Solicitudes::with('proyecto','proyecto.proyectotype')->with('solicitante')->find($id);

        if(!empty($resultado)){return response()->json($resultado);} else {return 'no';}
    }

    public function activar_solicitud(Request $request,$id){
        $solicitud = Solicitudes::find($id);
        $solicitud->status = 'activa';
        $solicitud->save();
        foreach($request->proyectos as $proyecto){
            $fecha =explode("T",$proyecto['tiempo_planificado_total']);
            $proyect = Proyecto::create([
                'nombre' => $proyecto['nombre'],
                'descripcion' => $proyecto['descripcion'],
                'autor' => $proyecto['autor'],
                'correo' => $proyecto['correo'],
                'telefono' => $proyecto['telefono'],
                'proyecto_type_id' => $proyecto['proyecto_type_id'],
                'periodico' => $proyecto['periodico'],
                'solicitud_id' => $id,
                'tiempo_planificado_total' => $fecha[0],
            ]);
        }

        $fecha =explode(" ",$solicitud->created_at);
        $entrega = new \DateTime($fecha[0]);
        $entrega->modify('+1 years');
        $entrega = $entrega->format('Y-m-d H:i:s');
        $notificar = explode(" ",$entrega);
        $notificar = new \DateTime($notificar[0]);
        $notificar->modify('-15 days');
        $notificar = $notificar->format('Y-m-d H:i:s');

        $proyect = Proyeccion::create([
            'solicitud_id' => $id,
            'fecha_entrega' => $entrega,
            'fecha_notificacion' => $notificar,
        ]);
    	return response()->json('Se activo la solicitud');
    }

    public function eliminar_solicitud(Request $request ,$id){
        $solicitud = Solicitudes::find($id);
        $solicitud->status = 'eliminada';
        $solicitud->save();
        $observacion = Observacion::create([
            'titulo' => 'Anulación de Solicitud '.$solicitud->nombre,
            'observacion' => $request->observacion,
        ]);
    	return response()->json('Se anulo la solicitud');
    }
    public function crear_solicitud(Request $request ){
        $solicitud = Solicitudes::create($request->all());
    	return response()->json($solicitud);
    }
    public function editar_solicitud(Request $request, $id ){
        $solicitud = Solicitudes::find($id)->update(['nombre' => $request->nombre,'publicacion' => $request->publicacion,'descripcion' => $request->descripcion,'solicitante_id' => $request->solicitante_id]);
        $solicitud = Solicitudes::find($id);
        $observacion = Observacion::create([
            'titulo' => 'Edicion de Solicitud '.$solicitud->nombre,
            'observacion' => $request->observacion,
        ]);

        return response()->json($solicitud);
    }

    public function obtener_proyecciones(){
    	return response()->json(Proyeccion::with('Solicitudes')->get());
    }
    public function enviar_mensaje(Request $request ){
        Mail::to($request->correo)->send(new Notificaciones($request->mensaje));
    	return response()->json('mensaje enviado');
    }
}
