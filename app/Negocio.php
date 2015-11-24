<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    //defino el nombre real de la tabla y su llave primaria
    protected $table = 'negocio';
    protected $primaryKey = 'codigo_negocio';

    //defino su relacion a muchos pedidos
    public function pedido()
    {
      return $this->hasMany('App\Pedido');
    }

    public function user()
    {
      return $this->hasMany('App\User');
    }

    public function mesa()
    {
      return $ths->hasMany('App\Mesa');
    }

    public function suscripcion()
    {
      return $this->belongsTo('App\Suscripcion');
    }
}
