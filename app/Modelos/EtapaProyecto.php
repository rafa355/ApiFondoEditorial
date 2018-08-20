<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use DB;
class EtapaProyecto extends Model
{
    protected $table = 'etapas_proyecto';

    protected $fillable = [
        'proyecto_id','etapa_type_id'
    ];

    public static function Consulta_etapa($etapa,$id){
        $features = DB::table('etapas_proyecto')
            ->select('etapas_proyecto.status as estado','etapas_proyecto.tiempo_transcurrido as transcurrido','etapas_proyecto.tiempo_estimado as estimado')
            ->where('etapas_proyecto.proyecto_id','=',$id)
            ->where('etapas_proyecto.etapa_type_id','=',$etapa)
            ->first();
        return $features;
      }

    public static function Consulta_adjuntos($etapa,$id){
        $features = DB::table('adjuntos')
            ->select('adjuntos.ubicacion as archivo','comentarios.conteido as comentario')
            ->Join('comentarios', 'adjuntos.id', '=', 'comentarios.adjunto_id')
            ->Join('etapas_proyecto', 'adjuntos.etapa_proyecto_id', '=', 'etapas_proyecto.id')
            ->where('etapas_proyecto.proyecto_id','=',$id)
            ->where('etapas_proyecto.etapa_type_id','=',$etapa)
            ->get();
        return $features;
      }
}
