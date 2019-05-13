<?php

use Illuminate\Database\Seeder;
use App\Clasificacion_Producto;

class ClasiProductoTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clasificacion_producto = new Clasificacion_Producto();
        $clasificacion_producto->clasificacion_producto = 'Bebos y Bebas';
        $clasificacion_producto->save();

        $clasificacion_producto = new Clasificacion_Producto();
        $clasificacion_producto->clasificacion_producto = 'Niños';
        $clasificacion_producto->save();
        
        $clasificacion_producto = new Clasificacion_Producto();
        $clasificacion_producto->clasificacion_producto = 'Juniors';
        $clasificacion_producto->save();
        
        $clasificacion_producto = new Clasificacion_Producto();
        $clasificacion_producto->clasificacion_producto = 'Caballeros';
        $clasificacion_producto->save();

        $clasificacion_producto = new Clasificacion_Producto();
        $clasificacion_producto->clasificacion_producto = 'Damas';
        $clasificacion_producto->save();
    }
}
