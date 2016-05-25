<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';

    public function users()
    {
        return $this->morphOne('App\User', 'user');
    }

    public function negocio()
    {
      return $this->belongsTo('App\Negocio', 'negocio', 'codigo_negocio');
  }
}
