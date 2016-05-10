<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promociones';

    public function negocio()
    {
        return $this->belongsTo('App\Negocio' , 'negocio_id', 'codigo_negocio');
    }
}
