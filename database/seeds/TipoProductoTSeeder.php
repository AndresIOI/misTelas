<?php

use Illuminate\Database\Seeder;
use App\Tipo_Producto;

class TipoProductoTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_producto = new Tipo_Producto();
        $tipo_producto->tipo_producto = 'Bata';
        $tipo_producto->save();
        
        $tipo_producto = new Tipo_Producto();
        $tipo_producto->tipo_producto = 'Playera';
        $tipo_producto->save();

        $tipo_producto = new Tipo_Producto();
        $tipo_producto->tipo_producto = 'Vestido';
        $tipo_producto->save();
        
        $tipo_producto = new Tipo_Producto();
        $tipo_producto->tipo_producto = 'Conjunto - Niño';
        $tipo_producto->save();

        $tipo_producto = new Tipo_Producto();
        $tipo_producto->tipo_producto = 'Conjunto - Niña';
        $tipo_producto->save();

        $tipo_producto = new Tipo_Producto();
        $tipo_producto->tipo_producto = 'Conjunto - Bebé';
        $tipo_producto->save();

        $tipo_producto = new Tipo_Producto();
        $tipo_producto->tipo_producto = 'Sudadera';
        $tipo_producto->save();

        $tipo_producto = new Tipo_Producto();
        $tipo_producto->tipo_producto = 'Overoles--niñas';
        $tipo_producto->save();

        $tipo_producto = new Tipo_Producto();
        $tipo_producto->tipo_producto = 'Ponchos-bebos y bebas';
        $tipo_producto->save();

        $tipo_producto = new Tipo_Producto();
        $tipo_producto->tipo_producto = 'Jumper--niñas';
        $tipo_producto->save();

        $tipo_producto = new Tipo_Producto();
        $tipo_producto->tipo_producto = 'Abrigos--bebos y bebas';
        $tipo_producto->save();
    }
}
