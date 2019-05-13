<?php

use Illuminate\Database\Seeder;
use App\UsuarioT;

class UsuarioTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new UsuarioT();
        $user->nombre_usuarioT = 'Alejandro Calderon';
        $user->save();

        $user = new UsuarioT();
        $user->nombre_usuarioT = 'Monica Martinez';
        $user->save();
    }
}
