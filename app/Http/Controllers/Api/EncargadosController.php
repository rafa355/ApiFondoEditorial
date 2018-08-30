<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Responsable;
use App\Modelos\ResponsableType;
use App\Modelos\ResponsableProyecto;

class EncargadosController extends Controller
{
    public function obtener_encargados(){
    	return response()->json(Responsable::with('tipo')->get());
    }

    public function obtener_principal($proyecto){
        $principal = ResponsableProyecto::with('encargado')->where('proyecto_id',$proyecto)->where('tipo','principal')->first();
        if(!empty($principal)){
            return response()->json($principal);
        }else{
            return response()->json("sin asignar");
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

    	return response()->json($encargado);
    }

    public function asignar_encargado($proyecto,$encargado ){
        $encargado_proyecto = ResponsableProyecto::create([
            'proyecto_id' => $proyecto,
            'responsable_id' => $encargado,
            'tipo' => 'principal',
        ]);

    	return response()->json($encargado_proyecto);
    }
}
