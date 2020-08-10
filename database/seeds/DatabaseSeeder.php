<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'cuenta'=>'ibeth.lobo',
            'email'=>'ibeth.lobo@gmail.com',
            'password'=> Hash::make('79426068'),
            'nombre'=> 'Ibeth Jeidy Lobo Ajno',
        ]);
        User::create([
            'cuenta'=>'jose.bilbao',
            'email'=>'jochelo_mbq23@hotmail.com',
            'password'=> Hash::make('60404788'),
            'nombre'=> 'Jose Bilbao',
        ]);
    }
}
