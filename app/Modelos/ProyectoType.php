<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ProyectoType extends Model
{
    protected $table = 'proyecto_type';

    protected $fillable = [
        'nombre', 
    ];
    public function Proyecto()
	{
	 	return $this->hasmany('App\Modelos\Proyecto');
    }

    }
