<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPromociones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promociones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_promo', 100);
            $table->text('descripcion_promo');
            $table->string('img_promo');
            $table->boolean('activa')->default(true);
            $table->date('valido_desde');
            $table->date('valido_hasta');
            $table->integer('negocio_id')->unsigned();
            $table->foreign('negocio_id')
                  ->references('codigo_negocio')
                  ->on('negocio')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('promociones');
    }
}
