<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSuscripcion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscripcion', function (Blueprint $table) {
            $table->increments('codigo_suscripcion');
	    $table->string('nombre_suscripcion', 200);
	    $table->float('precio_suscripcion');
	    $table->float('cuotaalmacenamiento_suscripcion');
	    $table->integer('limite_pedido')->nullable();
	    $table->integer('maxusuario_pedido')->nullable();
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
        Schema::drop('suscripcion');
    }
}
