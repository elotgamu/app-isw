<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UnirCategoriaANegocio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categoria', function (Blueprint $table) {
            $table->integer('negocio')->unsigned();
            $table->foreign('negocio')
                  ->references('codigo_negocio')
                  ->on('negocio')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categoria', function (Blueprint $table) {
            $table->dropForeign('categoria_negocio_foreign');
            $table->dropColumn('negocio');
        });
    }
}
