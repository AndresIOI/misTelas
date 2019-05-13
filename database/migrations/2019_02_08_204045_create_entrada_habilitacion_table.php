<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradaHabilitacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_habilitacion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entrada_id');
            $table->unsignedInteger('habilitacion_id');
            $table->unsignedInteger('empaque_id');
            $table->float('precio_unitario');
            $table->float('precio_total');
            $table->float('cantidad');
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
        Schema::dropIfExists('entrada_habilitacion');
    }
}
