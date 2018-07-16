<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    protected $table = 'solicitantes';

    protected $fillable = [
        'nombre', 
    ];

    public function solicitudes()
	{
	 	return $this->hasmany('App\Modelos\Solicitudes');
	}
}
