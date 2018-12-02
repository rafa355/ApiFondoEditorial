<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Solicitante;
use App\Modelos\Observacion;

use Mail;
use App\Mail\Notificaciones;
class SolicitantesController extends Controller
{
    public function obtener_solicitantes(){
    	return response()->json(Solicitante::where('status','activo')->orderby('nombre','asc')->get());
    }

    public function crear_solicitante(Request $request ){
        $solicitante = Solicitante::create($request->all());
        $observacion = Observacion::create([
            'actualizacion' => 'NO',
            'titulo' => 'Creación de Usuario/Cliente',
            'observacion' => 'Se creó el Usuario/Cliente '.$solicitante->nombre,
        ]);
        //Mail::to('rafa350.rr@gmail.com')->send(new Notificaciones('Se registro nuevo solicitante.'));
    	return response()->json($solicitante);
    }

    public function eliminar_solicitante(Request $request,$id){
        $Solicitante = Solicitante::find($id);
        $Solicitante->status = 'eliminado';
        $Solicitante->save();
        $observacion = Observacion::create([
            'actualizacion' => $request->actualizacion,
            'titulo' => 'Eliminación de Usuario/Cliente '.$Solicitante->nombre,
            'observacion' => $request->observacion,
        ]);
    	return response()->json('Se Elimino');
    }
}
