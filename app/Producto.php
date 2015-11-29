<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'producto';
    protected $primaryKey = 'codigo_producto';

    public function categoria()
    {
      return $this->belongsTo('App\Categoria');
    }

    //definimos su relacion muchos a muchos con pedidos
    //el resto de la definicion de las FK de la tabla 
    //q resulta de esta relacion
    //estan definidos en App\Pedido
    public function pedido()
    {
      return $this->belongsToMany('App\Pedido');
    }
}
