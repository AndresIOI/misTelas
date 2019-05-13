<?php

use Illuminate\Database\Seeder;
use App\Producto_Terminado;
use App\Inventario_Productos_Terminados;

class ProductosTerminadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto_terminado = new Producto_Terminado();
        $producto_terminado->SKU = "SUDA0123456";
        $producto_terminado->clasificacion_id = 4;
        $producto_terminado->tipo_id = 7;
        $producto_terminado->descripcion = "Sudadera 0123456";
        $producto_terminado->save();

        $producto_terminado = new Producto_Terminado();
        $producto_terminado->SKU = "VES0987654";
        $producto_terminado->clasificacion_id = 5;
        $producto_terminado->tipo_id = 3;
        $producto_terminado->descripcion = "Vestido 987654";
        $producto_terminado->save();
        
        $producto_terminado = new Producto_Terminado();
        $producto_terminado->SKU = "SUDA0258963";
        $producto_terminado->clasificacion_id = 1;
        $producto_terminado->tipo_id = 7;
        $producto_terminado->descripcion = "Sudadera 0258963";
        $producto_terminado->save();
    
    }
}
