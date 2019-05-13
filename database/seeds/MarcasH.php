<?php

use Illuminate\Database\Seeder;
use App\HabilitacionMarcas;

class MarcasH extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new HabilitacionMarcas();
        $user->nombre_marca = 'DISNEY';
        $user->save();

        $user = new HabilitacionMarcas();
        $user->nombre_marca = 'HASBRO';
        $user->save();

        $user = new HabilitacionMarcas();
        $user->nombre_marca = 'DC';
        $user->save();

        $user = new HabilitacionMarcas();
        $user->nombre_marca = 'NBC';
        $user->save();

        $user = new HabilitacionMarcas();
        $user->nombre_marca = 'WARNER';
        $user->save();

        $user = new HabilitacionMarcas();
        $user->nombre_marca = 'PROPIAS';
        $user->save();
    }
}
