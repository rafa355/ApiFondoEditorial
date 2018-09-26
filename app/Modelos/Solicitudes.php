<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use DB;
class Solicitudes extends Model
{
    protected $table = 'solicitudes';

    protected $fillable = [
        'nombre','publicacion','solicitante_id','descripcion',
    ];

    public function solicitante()
    {
        return $this->BelongsTo('App\Modelos\Solicitante');
    }
    public function proyecto()
	{
         return $this->hasMany('App\Modelos\Proyecto', 'solicitud_id');
	}

}


