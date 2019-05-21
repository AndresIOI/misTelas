<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradaProductosTerminadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada__productos__terminados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_entrada')->unique();
            $table->unsignedInteger('empleado_id');
            $table->unsignedInteger('tipo_produccion_id');
            $table->unsignedInteger('maquilero_id');
            $table->string('fecha');
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
        Schema::dropIfExists('entrada__productos__terminados');
    }
}
