<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table = 'categoria';
    protected $primaryKey = 'codigo_categoria';

    public function producto()
    {
      return $this->hasMany('App\Producto');
    }
}
