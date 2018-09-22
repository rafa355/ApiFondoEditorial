<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Proyecto;
use App\Modelos\EtapaProyecto;

class ContadorController extends Controller
{
    public function produccion(){
    	return response()->json(Proyecto::All()->count());
    }
    public function preliminar(){
    	return response()->json(EtapaProyecto::where('etapa_type_id',1)->count());
    }
    public function diagramacion(){
    	return response()->json(EtapaProyecto::where('etapa_type_id',2)->count());
    }
    public function publicacion(){
    	return response()->json(EtapaProyecto::where('etapa_type_id',3)->count());
    }
}
