<?php

use Illuminate\Database\Seeder;
use App\Rol;
use App\User;
class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = new Rol();
        $rol->rol = "Administrador";
        $rol->save();
        
        $rol = new Rol();
        $rol->rol = "Usuario Supervisor";
        $rol->save();
        
        $rol = new Rol();
        $rol->rol = "Usuario Telas";
        $rol->save();
        
        $rol = new Rol();
        $rol->rol = "Usuario Habilitación";
        $rol->save();

        $rol = new Rol();
        $rol->rol = "Usuario Productos Terminados";
        $rol->save();

        $rol = new Rol();
        $rol->rol = "Usuario Observador";
        $rol->save();

        $rol = new Rol();
        $rol->rol = "Usuario Shop";
        $rol->save();

        
    }
}
