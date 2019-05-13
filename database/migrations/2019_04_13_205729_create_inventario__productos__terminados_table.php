<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioProductosTerminadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario__productos__terminados', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('producto_id');
            $table->unsignedInteger('talla_id');
            $table->integer('cantidad_inventario');
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
        Schema::dropIfExists('inventario__productos__terminados');
    }
}
