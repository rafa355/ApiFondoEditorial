<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ResponsableProyecto extends Model
{
    protected $table = 'responsable_proyecto';

    protected $fillable = [
        'proyecto_id','responsable_id'
    ];

    public function encargado()
    {
        return $this->BelongsTo('App\Modelos\Responsable','responsable_id');
    }

}
