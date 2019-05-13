<?php

use Illuminate\Database\Seeder;
use App\Rol;
use App\User;

class Usersseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name = 'Admin';
        $user->username = 'admin';
        $user->rol_id = '1';
        $user->email = 'admin@mail.com';
        $user->password = bcrypt('12345');
        $user->save();

        $user = new User();
        $user->name = 'user';
        $user->username = 'user';
        $user->rol_id = '2';
        $user->email = 'user@mail.com';
        $user->password = bcrypt('12345');
        $user->save();

        $user = new User();
        $user->name = 'telas';
        $user->username = 'telas';
        $user->rol_id = '3';
        $user->email = 'telas@mail.com';
        $user->password = bcrypt('12345');
        $user->save();

        $user = new User();
        $user->name = 'habil';
        $user->username = 'habil';
        $user->rol_id = '4';
        $user->email = 'habil@mail.com';
        $user->password = bcrypt('12345');
        $user->save();

        $user = new User();
        $user->name = 'pt';
        $user->username = 'pt';
        $user->rol_id = '5';
        $user->email = 'pt@mail.com';
        $user->password = bcrypt('12345');
        $user->save();

        $user = new User();
        $user->name = 'obser';
        $user->username = 'obser';
        $user->rol_id = '6';
        $user->email = 'obser@mail.com';
        $user->password = bcrypt('12345');
        $user->save();
    }
}
