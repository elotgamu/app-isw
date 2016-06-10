<?php

namespace App;

use File;
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

    /*public function user()
    {
      return $this->hasMany('App\User', 'negocio', 'codigo_negocio');
  }*/

    public function admin()
    {
        return $this->hasOne('App\Admin', 'negocio', 'codigo_negocio');
    }

    public function mesa()
    {
      return $this->hasMany('App\Mesa');
    }

    public function suscripcion()
    {
      return $this->belongsTo('App\Suscripcion');
    }

    public function categoria()
    {
        return $this->hasMany('App\Categoria', 'negocio', 'codigo_negocio');
    }

    public function promociones()
    {
        return $this->hasMany('App\Promocion', 'negocio_id', 'codigo_negocio');
    }

    public function reservacion()
    {
        return $this->hasMany('App\Reservacion', 'negocio', 'codigo_negocio');
    }

    public function folderProfile()
    {
        $name = str_replace(' ', '', $this->nombre_negocio);
        $ruta_a_public = public_path().'/negocios/';
        $ruta_a_public .= $name;
        $imgs = $ruta_a_public . '/imgs';
        $videos = $ruta_a_public . '/videos';
        File::makeDirectory($ruta_a_public, $mode = 0777, true, true);
        File::makeDirectory($imgs, $mode = 0777, true, true);
        File::makeDirectory($videos, $mode = 0777, true, true);
    }

    public function nameConcatenated()
    {
        $name_concatenated = str_replace(' ', '', $this->nombre_negocio);
        return $name_concatenated;
    }
}
