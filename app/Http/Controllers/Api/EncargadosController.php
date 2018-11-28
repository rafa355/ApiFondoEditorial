<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Responsable;
use App\Modelos\ResponsableType;
use App\Modelos\ResponsableProyecto;
use App\Modelos\Observacion;

use Mail;
use App\Mail\Notificaciones;

class EncargadosController extends Controller
{
    public function obtener_encargados(){
    	return response()->json(Responsable::with('tipo')->orderby('nombre','asc')->where('status','activo')->get());
    }

    public function obtener_principal($proyecto){
        $principal = ResponsableProyecto::with('encargado')->where('proyecto_id',$proyecto)->where('tipo','principal')->first();
        if(!empty($principal)){
            return response()->json($principal);
        }else{
            return response()->json($principal);
        }
    }
    public function obtener_encargado($id){
        return response()->json(Responsable::find($id));
        
    }
    public function obtener_encargados_type(){
    	return response()->json(ResponsableType::all());
    }

    public function crear_encargado(Request $request ){

        $encargado = Responsable::create($request->all());

        //Mail::to('rafa350.rr@gmail.com')->send(new Notificaciones('Se registro nuevo responsable.'));

    	return response()->json($encargado);
    }

    public function asignar_encargado($proyecto,$encargado ){
        $encargado_proyecto = ResponsableProyecto::where('proyecto_id',$proyecto)->where('tipo','principal')->first();
        $responsable = Responsable::find($encargado);
        if(!($encargado_proyecto)){
            $encargado_proyecto = ResponsableProyecto::create([
                'proyecto_id' => $proyecto,
                'responsable_id' => $encargado,
                'tipo' => 'principal',
            ]);
            //Mail::to($responsable->correo)->send(new Notificaciones('Ha sido asignado a un proyecto'));
        }else{
            $encargado_proyecto->responsable_id = $encargado;
            $encargado_proyecto->save();
            //Mail::to($responsable->correo)->send(new Notificaciones('Ha sido asignado a un proyecto'));
        }

    	return response()->json($encargado_proyecto);
    }

    public function eliminar_encargado(Request $request ,$id){
        $encargado = Responsable::find($id);
        $encargado->status = 'eliminado';
        $encargado->save();
        $observacion = Observacion::create([
            'actualizacion' => $request->actualizacion,
            'titulo' => 'Eliminación de encargado '.$encargado->nombre,
            'observacion' => $request->observacion,
        ]);
    	return response()->json('Se eliminó el encargado');
    }

    public function editar_encargado(Request $request, $id ){
        $encargado = Responsable::find($id)->update(['nombre' => $request->nombre,'correo' => $request->correo,'responsable_type_id' => $request->responsable_type_id]);
        $encargado = Responsable::find($id);
        $observacion = Observacion::create([
            'actualizacion' => $request->actualizacion,
            'titulo' => 'Edicion de Encargado '.$encargado->nombre,
            'observacion' => $request->observacion,
        ]);

        return response()->json($encargado);
    }
}
