<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    public function users()
    {
        return $this->morphOne('App\User', 'user');
    }

    public function pedido()
    {
        return $this->hasMany('App\Pedido');
    }

    public function reservacion()
    {
        return $this->hasMany('App\Reservacion');
    }
}
