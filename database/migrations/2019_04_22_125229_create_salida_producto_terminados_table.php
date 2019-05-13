<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalidaProductoTerminadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_producto_terminados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_requisicion');
            $table->integer('contador');
            $table->boolean('contador_activo')->default(false);
            $table->float('tipoSalida_id');
            $table->float('importe_total_salida');
            $table->unsignedInteger('usuarioSalida_id');
            $table->unsignedInteger('usuario_id');
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
        Schema::dropIfExists('salida_producto_terminados');
    }
}
