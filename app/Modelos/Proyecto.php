<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use DB;
class Proyecto extends Model
{
    protected $table = 'proyectos';

    protected $fillable = [
        'nombre','descripcion','proyecto_type_id','solicitud_id',
    ];

    public function solicitudes()
    {
        return $this->BelongsTo('App\Modelos\Solicitudes');
    }
    public function ProyectoType()
    {
        return $this->BelongsTo('App\Modelos\ProyectoType');
    }

}
