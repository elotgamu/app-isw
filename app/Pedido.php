<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
    //defino el nombre real de la tabla y su llave PK
{
    protected $table = 'pedido';
    protected $primaryKey = 'codigo_pedido';

    //y aqui defino su relacion que pertenece a un negocio
    public function negocio()
    {
      return $this->belongsTo('App\Negocio');
    }
}
