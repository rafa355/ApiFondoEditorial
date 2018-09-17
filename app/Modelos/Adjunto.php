<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Adjunto extends Model
{
    protected $table = 'adjuntos';

    protected $fillable = [
        'ubicacion', 'etapa_proyecto_id','status'
    ];
    public function comentarios()
	{
         return $this->hasMany('App\Modelos\Comentarios', 'adjunto_id');
	}
}
