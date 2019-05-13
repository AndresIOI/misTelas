<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_salida', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('salida_id');
            $table->unsignedInteger('producto_id');
            $table->unsignedInteger('talla_id');
            $table->float('cantidad');
            $table->float('precio_unitario');
            $table->float('precio_total');
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
        Schema::dropIfExists('producto_salida');
    }
}
