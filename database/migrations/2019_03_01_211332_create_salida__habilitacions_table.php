<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalidaHabilitacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida__habilitacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_requisicion');
            $table->integer('piezas');
            $table->integer('contador');
            $table->boolean('contador_activo')->default(false);
            $table->float('importe_total_salida');
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
        Schema::dropIfExists('salida__habilitacions');
    }
}
