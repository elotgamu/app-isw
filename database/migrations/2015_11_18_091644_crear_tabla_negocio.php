<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaNegocio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negocio', function (Blueprint $table) {
            $table->increments('codigo_negocio');
	    $table->string('nombre_negocio', 100);
	    $table->text('descipcion_negocio');
	    $table->string('ubicacion_negocio', 200);
	    $table->string('propietario_negocio', 100);
	    $table->string('email_negocio')->nullable();
	    $table->string('telefono_negocio', 30);
	    $table->string('menu_negocio');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('negocio');
    }
}
