<?php

use Illuminate\Database\Seeder;
use App\Proveedor;

class ProveedorTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proveedor = new Proveedor();
        $proveedor->id = '1';
        $proveedor->nombreProveedor = 'Juan Carlos';
        $proveedor->save();

        $proveedor = new Proveedor();
        $proveedor->id = '2';
        $proveedor->nombreProveedor = 'ROMERS';
        $proveedor->save();

        $proveedor = new Proveedor();
        $proveedor->id = '3';
        $proveedor->nombreProveedor = 'SATEX';
        $proveedor->save();

        $proveedor = new Proveedor();
        $proveedor->id = '4';
        $proveedor->nombreProveedor = 'TELCO';
        $proveedor->save();

        $proveedor = new Proveedor();
        $proveedor->id = '5';
        $proveedor->nombreProveedor = 'Otros';
        $proveedor->save();

    }
}
