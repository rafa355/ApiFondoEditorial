<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use DB;
class EtapaProyecto extends Model
{
    protected $table = 'etapas_proyecto';

    protected $fillable = [
        'nombre',
    ];

    public static function Consulta_etapa($etapa,$id){
        $features = DB::table('etapas_proyecto')
            ->select('etapas_proyecto.status as estado','etapas_proyecto.tiempo_transcurrido as transcurrido','etapas_proyecto.tiempo_estimado as estimado')
            ->where('etapas_proyecto.proyecto_id','=',$id)
            ->where('etapas_proyecto.etapa_type_id','=',$etapa)
            ->get();
        return $features;
      }

    public static function Consulta_adjuntos($etapa,$id){
        $features = DB::table('etapas_proyecto')
            ->select('adjuntos.ubicacion as archivo','comentarios.conteido as comentario')
            ->leftJoin('adjuntos', 'etapas_proyecto.id', '=', 'adjuntos.etapa_proyecto_id')
            ->leftJoin('comentarios', 'adjuntos.id', '=', 'comentarios.adjunto_id')
            ->where('etapas_proyecto.proyecto_id','=',$id)
            ->where('etapas_proyecto.etapa_type_id','=',$etapa)
            ->get();
        return $features;
      }
}
