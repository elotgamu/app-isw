<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    //
    protected $table = 'mesa';
    protected $pimaryKey = 'codigo_mesa';

    public function reservacion()
    {
      return $this->belongsTo('App\Reservacion');
    }

    public function negocio()
    {
      return $this->belongsTo('App\Negocio');
    }
}
