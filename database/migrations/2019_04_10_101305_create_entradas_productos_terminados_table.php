<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradasProductosTerminadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas_productos_terminados', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entrada_id');
            $table->unsignedInteger('producto_terminado_id');
            $table->integer('cantidad_unidades');
            $table->float('costo_unitario');
            $table->float('costo_total');
            $table->unsignedInteger('talla_id');
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
        Schema::dropIfExists('entradas_productos_terminados');
    }
}
