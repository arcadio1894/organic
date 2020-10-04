<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Customer;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userA = User::create([
            'name'  => 'Administrador',
            'email' => 'admin@organic.com',
            'dni'   => '48317523',
            'password' => bcrypt('48317523'),
        ]);
        $userA->assignRole('admin');
        $userU = User::create([
            'name'  => 'UsuarioTest',
            'email' => 'usuario@organic.com',
            'dni'   => '11111111',
            'password' => bcrypt('11111111'),
        ]);
        $customerU = Customer::create([
            'name' => $userU->name,
            'phone' => '985645874',
            'user_id' => $userU->id
        ]);
        $userU->assignRole('user');
        $userC = User::create([
            'name'  => 'CreatorTest',
            'email' => 'creador@organic.com',
            'dni'   => '22222222',
            'password' => bcrypt('22222222'),
        ]);
        $userC->assignRole('creator');
    }
}
