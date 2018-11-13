<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Proyecto;

class ReportesController extends Controller
{
    public function reporte(Request $request, $tipo){
        $nombre ='reporte_'.str_random(4) . '.pdf';
        $directorio_final = public_path('pdfs/').$nombre;
        # Enviamos el fichero PDF al navegador.
        //$mipdf ->stream("Claustro.pdf");
        $reporte = Proyecto::Proyectos();
        $pdf = \PDF::loadView('pdf.prueba',['reporte' => $reporte])->save($directorio_final);
    $pdfs=$pdf->output();
        if(file_put_contents($directorio_final, $pdfs) ){
            return response()->json($nombre);
        }else{
            return response()->json('Se sadasdsad la solicitud');

        }  
        return response()->download($adjunto->ubicacion );

    }
    public function imprimir_reporte($url){
        return response()->download(public_path('pdfs/').$url);

    }
}
