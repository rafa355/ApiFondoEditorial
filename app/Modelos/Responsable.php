<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use DB;

class Responsable extends Model
{
    protected $table = 'responsables';

    protected $fillable = [
        'nombre','correo', 'responsable_type_id'
    ];

    public function tipo()
    {
        return $this->BelongsTo('App\Modelos\ResponsableType','responsable_type_id');
    }

}
