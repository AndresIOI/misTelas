<?php

use Illuminate\Database\Seeder;
use App\UserOrdenT;

class UserOrdenTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new UserOrdenT();
        $user->Nombre_userOrden = 'Alejandro Calderón';
        $user->save();

        $user = new UserOrdenT();
        $user->Nombre_userOrden = 'Monica Patricia';
        $user->save();
    }
}
