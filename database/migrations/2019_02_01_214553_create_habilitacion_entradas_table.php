<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabilitacionEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habilitacion_entradas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ordenCompra',191)->unique();
            $table->string('claveFactura',191)->unique();
            $table->string('fecha',191);
            $table->string('OperarioRecepcion',191);
            $table->unsignedInteger('operarioCompra');
            $table->foreign('operarioCompra')->references('id')->on('habilitacion_usuarios_ordens');
            $table->unsignedInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('habilitacion_proveedors');
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
        Schema::dropIfExists('habilitacion_entradas');
    }
}
