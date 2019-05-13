<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoDevolucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_devolucion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('devolucion_id');
            $table->unsignedInteger('producto_id');
            $table->unsignedInteger('talla_id');
            $table->float('cantidad_devolucion');
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
        Schema::dropIfExists('producto_devolucion');
    }
}
