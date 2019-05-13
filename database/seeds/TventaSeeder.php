<?php

use Illuminate\Database\Seeder;
use App\Tventa;
class TventaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new Tventa();
        $tipo->Tipo_venta = 'Muestra';
        $tipo->save();

        $tipo = new Tventa();
        $tipo->Tipo_venta = 'Saldo Defecto';
        $tipo->save();
        
        $tipo = new Tventa();
        $tipo->Tipo_venta = 'Saldo Sobrante';
        $tipo->save();

        $tipo = new Tventa();
        $tipo->Tipo_venta = 'Venta Mayorista';
        $tipo->save();
        

    }
}
