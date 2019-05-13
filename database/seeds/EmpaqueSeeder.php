<?php

use Illuminate\Database\Seeder;
use App\Empaque;

class EmpaqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empaque = new Empaque();
        $empaque->empaque = 'Rollo';
        $empaque->save();

        $empaque = new Empaque();
        $empaque->empaque = 'Caja';
        $empaque->save();

        $empaque = new Empaque();
        $empaque->empaque = 'Paquete';
        $empaque->save();

        $empaque = new Empaque();
        $empaque->empaque = 'Bolsa';
        $empaque->save();
    }
}
