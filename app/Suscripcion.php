<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    //doy el nombre de la tabla real y su PK
    protected $table = 'suscripcion';
    protected $primaryKey = 'codigo_suscripcion';

    //defino su relacion una uscripcion tiene muchos negocios
    public function negocio()
    {
      return $this->hasMany('App\Negocio');
    }
}
