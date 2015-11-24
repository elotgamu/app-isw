<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    //
    protected $table = 'reservacion';
    protected $primaryKey = 'codigo_reservacion';

    public function mesa()
    {
      return $this->hasMany('App\Mesa');
    }
}
