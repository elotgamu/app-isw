<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('codigo_producto');
            $table->string('nombre_producto', 500);
            $table->decimal('precio_producto', 19, 2);
            $table->integer('categoria')->unsigned()->nullable();
            $table->foreign('categoria')->references('codigo_categoria')->on('categoria')->onDelete('cascade');
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
        Schema::drop('producto');
    }
}
