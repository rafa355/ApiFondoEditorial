<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Proyecto;
use App\Modelos\Solicitudes;
use App\Modelos\EtapaProyecto;

class ContadorController extends Controller
{
    public function produccion(){
    	return response()->json(Proyecto::Proyectos()->count());
    }
    public function anuladas(){
    	return response()->json(Solicitudes::where('status','eliminada')->get()->count());
    }
    public function preliminar(){
    	return response()->json(EtapaProyecto::where('etapa_type_id',1)->where('status',1)->count());
    }
    public function diagramacion(){
    	return response()->json(EtapaProyecto::where('etapa_type_id',2)->whereIn('status',[1,3])->count());
    }
    public function publicacion(){
    	return response()->json(EtapaProyecto::where('etapa_type_id',3)->count());
    }
}
