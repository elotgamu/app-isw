<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EliminarRolNegoUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_negocio_foreign');
            $table->dropForeign('users_rol_foreign');
            $table->dropColumn('negocio');
            $table->dropColumn('rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('negocio')->unsigned()->nullable();
            $table->foreign('negocio')->references('codigo_negocio')->on('negocio')->onDelete('cascade');
            $table->integer('rol')->unsigned()->nullable();
            $table->foreign('rol')->references('codigo_rol')->on('rol')->onDelete('cascade');
        });
    }
}
