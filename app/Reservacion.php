<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    //
    protected $table = 'reservacion';
    protected $primaryKey = 'codigo_reservacion';

    public function mesa()
    {
      return $this->hasMany('App\Mesa');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function negocio()
    {
        return $this->belongsTo('App\Negocio', 'negocio', 'codigo_negocio');
    }
}
