<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Proyecto;
use App\Modelos\Solicitudes;
class datos_generales{
    public $fecha_actual;
    public $periodo_bajo;
    public $periodo_alto;
}
class datos_solicitudes {
    public $todas;
    public $activas;
    public $pendientes;
    public $anuladas;
}
class ReportesController extends Controller
{
    public function reporte(Request $request, $tipo){
        $nombre ='reporte_'.str_random(4) . '.pdf';
        $directorio_final = public_path('pdfs/').$nombre;
        $solicitudes = new datos_solicitudes();
        $parametros = new datos_generales();
        $actual = new \DateTime();
        $rango_bajo =explode("T",$request->rango[0]);
        $rango_alto =explode("T",$request->rango[1]);

        //Datos de Solicitudes
        $solicitudes->activas = Solicitudes::where('status','activa')->whereBetween('created_at', array($rango_bajo[0], $rango_alto[0]))->with('solicitante')->with('Proyecto')->get();
        $solicitudes->pendientes = Solicitudes::where('status','pendiente')->whereBetween('created_at', array($rango_bajo[0], $rango_alto[0]))->with('solicitante')->with('Proyecto')->get();
        $solicitudes->anuladas = Solicitudes::where('status','eliminada')->whereBetween('created_at', array($rango_bajo[0], $rango_alto[0]))->with('solicitante')->with('Proyecto')->get();

        //transformando la fecha recibida en una fecha presentable
        $fecha_bajo =explode("-",$rango_bajo[0]);
        $rango_bajo  = $fecha_bajo[2].'/'.$fecha_bajo[1].'/'.$fecha_bajo[0];
        $fecha_alta =explode("-",$rango_alto[0]);
        $rango_alto  = $fecha_alta[2].'/'.$fecha_alta[1].'/'.$fecha_alta[0];

        //Datos Generales
        $parametros->fecha_actual = $actual->format('d/m/Y H:i');
        $parametros->periodo_bajo = $rango_bajo;
        $parametros->periodo_alto = $rango_alto;

        $pdf = \PDF::loadView('pdf.solicitudes.por_estado',['solicitudes' => $solicitudes,'parametros' => $parametros])->setPaper('letter','landscape')->save($directorio_final);
        $pdfs=$pdf->output();
        if(file_put_contents($directorio_final, $pdfs) ){
            return response()->json($nombre);
        }else{
            return response()->json('Se sadasdsad la solicitud');
        }
    }
    public function imprimir_reporte($url){
        return response()->download(public_path('pdfs/').$url);

    }
}
