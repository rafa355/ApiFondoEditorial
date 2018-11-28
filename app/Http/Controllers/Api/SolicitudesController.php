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
class datos_solicitudes {
    public $todas;
    public $activas;
    public $pendientes;
    public $anuladas;
}
class datos_proyecciones {
    public $todas;
}
class SolicitudesController extends Controller
{
    public function obtener_solicitudes(){
        $solicitudes = new datos_solicitudes();
        $solicitudes->todas = Solicitudes::where('status','!=','eliminada')->with('solicitante')->with('Proyecto')->get();
        $solicitudes->activas = Solicitudes::where('status','activa')->with('solicitante')->with('Proyecto')->get();
        $solicitudes->pendientes = Solicitudes::where('status','pendiente')->with('solicitante')->with('Proyecto')->get();
        $solicitudes->anuladas = Solicitudes::where('status','eliminada')->with('solicitante')->with('Proyecto')->get();
    	return response()->json($solicitudes);
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
            'actualizacion' => $request->actualizacion,
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
        $solicitud = Solicitudes::find($id)->update($request->all());
        return response()->json($solicitud);
    }

    public function obtener_proyecciones(){
       $proyecciones = new datos_proyecciones();
       $proyecciones->todas = Proyeccion::with('Solicitudes')->get();
        return response()->json($proyecciones);
    }
    public function enviar_mensaje(Request $request ){
        $correo = $request->correo;
        $asunto = $request->asunto;
        Mail::send('emails.notificaciones',['notificacion'=>$request->mensaje],function($msj) use($correo,$asunto){
            $msj->subject($asunto);
            $msj->to($correo);
        });
    	return response()->json('mensaje enviado');
    }
}
