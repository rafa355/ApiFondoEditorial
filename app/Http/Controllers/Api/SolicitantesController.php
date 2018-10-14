<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Solicitante;

use Mail;
use App\Mail\Notificaciones;
class SolicitantesController extends Controller
{
    public function obtener_solicitantes(){
    	return response()->json(Solicitante::where('status','activo')->orderby('nombre','asc')->get());
    }

    public function crear_solicitante(Request $request ){
        $solicitante = Solicitante::create($request->all());
        Mail::to('rafa350.rr@gmail.com')->send(new Notificaciones('Se registro nuevo solicitante.'));
    	return response()->json($solicitante);
    }

    public function eliminar_solicitante($id){
        $Solicitante = Solicitante::find($id);
        $Solicitante->status = 'eliminado';
        $Solicitante->save();
    	return response()->json('Se Elimino');
    }
}
