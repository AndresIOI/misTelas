<?php

use Illuminate\Database\Seeder;
use App\Maquileros;

class MaquilerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Maquileros();
        $user->nombre_maquilero = 'Maquilero 1';
        $user->save();

        $user = new Maquileros();
        $user->nombre_maquilero = 'Maquilero 2';
        $user->save();

        $user = new Maquileros();
        $user->nombre_maquilero = 'Maquilero 3';
        $user->save();

        $user = new Maquileros();
        $user->nombre_maquilero = 'Maquilero 4';
        $user->save();

        $user = new Maquileros();
        $user->nombre_maquilero = 'Sin Maquilero';
        $user->save();
    }
}
