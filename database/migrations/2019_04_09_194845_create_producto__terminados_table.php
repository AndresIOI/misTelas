<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTerminadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto__terminados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('SKU')->unique();
            $table->string('img');
            $table->float('precio_publico');
            $table->unsignedInteger('clasificacion_id');
            $table->unsignedInteger('tipo_id');
            $table->mediumText('descripcion');
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
        Schema::dropIfExists('producto__terminados');
    }
}
