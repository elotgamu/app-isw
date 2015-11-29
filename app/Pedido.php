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

    //defino la relacion muchos a muchos de pedido producto
    // 1) el modelo al que apunta
    // 2) la tabla muchos a muchos(su nombre real)
    // 3) primera FK
    // 4) segunda FK
    // withPivot -- define los atributos que no son FK
    // withTimestamps -- habilita los timestamps para campos created_at y updated_at
    public function producto()
    {
      return $this->belongsToMany('App\Producto', 'pedido_producto', 'pedido', 'producto')->withPivot('cantidad_producto')->withTimestamps();
    }
}
