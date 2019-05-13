<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSalidasTelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_tela', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tela_id');
            $table->foreign('tela_id')->references('id')->on('telas');
            $table->unsignedInteger('numRequisicion');
            $table->foreign('numRequisicion')->references('id')->on('salidas');
            $table->string('color');
            $table->float('precioUnitario');
            $table->float('importeTotal');
            $table->float('cantidadSalida');
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
        Schema::dropIfExists('table_salidas_telas');
    }
}
