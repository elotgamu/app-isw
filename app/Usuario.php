<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //defino nombre real de la tabla y luego su PK
    protected $table = 'usuario';
    protected $primaryKey = 'codigo_usuario';

    public function negocio()
    {
      return $this->belongsTo('App\Negocio');
    }

    public function rol()
    {
      return $this->belongsTo('App\Rol');
    }
}
