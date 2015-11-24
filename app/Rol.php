<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //defino nombre real de la tabla y luego su PK
    protected $table = 'rol';
    protected $primaryKey = 'codigo_rol';

    //defino la relacion un rol tiene muchos usuarios
    public function user()
    {
      return $this->hasMany('App\User');
    }
}
