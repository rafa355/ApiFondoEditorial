<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Solicitante;
class SolicitantesController extends Controller
{
    public function obtener_solicitantes(){
    	return response()->json(Solicitante::all());
    }
}
