<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevolucionEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devolucion_tela', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tela_id');
            $table->foreign('tela_id')->references('id')->on('telas');
            $table->unsignedInteger('id_devolucion');
            $table->foreign('id_devolucion')->references('id_devolucion')->on('devolucions');
            $table->string('color');
            $table->float('cantidadDevolucion');
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
        Schema::dropIfExists('devolucion_entrada');
    }
}
