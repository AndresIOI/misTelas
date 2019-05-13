<?php

use Illuminate\Database\Seeder;
use App\Talla_Producto;

class TallaProductoTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = '2';
        $talla_producto->clasificacion_id = 1;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = '3';
        $talla_producto->clasificacion_id = 1;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = '3x';
        $talla_producto->clasificacion_id = 1;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = '4';
        $talla_producto->clasificacion_id = 2;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = '6';
        $talla_producto->clasificacion_id = 2;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = '8';
        $talla_producto->clasificacion_id = 2;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = '10';
        $talla_producto->clasificacion_id = 2;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = '12';
        $talla_producto->clasificacion_id = 3;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = '14';
        $talla_producto->clasificacion_id = 3;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = '16';
        $talla_producto->clasificacion_id = 3;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = '16x';
        $talla_producto->clasificacion_id = 3;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = 'CH';
        $talla_producto->clasificacion_id = 4;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = 'M';
        $talla_producto->clasificacion_id = 4;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = 'G';
        $talla_producto->clasificacion_id = 4;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = 'XG';
        $talla_producto->clasificacion_id = 4;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = 'CH';
        $talla_producto->clasificacion_id = 5;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = 'M';
        $talla_producto->clasificacion_id = 5;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = 'G';
        $talla_producto->clasificacion_id = 5;
        $talla_producto->save();
        
        $talla_producto = new Talla_Producto();
        $talla_producto->talla = 'XG';
        $talla_producto->clasificacion_id = 5;
        $talla_producto->save();
    }
}
