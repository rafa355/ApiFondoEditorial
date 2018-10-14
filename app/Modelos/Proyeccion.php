<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class Proyeccion extends Model
{
    protected $table = 'proyecciones';

    protected $fillable = [
        'solicitud_id','fecha_entrega','fecha_notificacion'
    ];

    public function Solicitudes()
    {
        return $this->BelongsTo('App\Modelos\Solicitudes','solicitud_id');
    }
}
