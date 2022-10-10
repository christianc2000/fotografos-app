<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Christian',
                'email' => 'christian@gmail.com',
                'password' => bcrypt('12345678'),
                'tipo' => 'F'
            ],
            [
                'name' => 'Fotoajax',
                'email' => 'fotoajax@gmail.com',
                'password' => bcrypt('12345678'),
                'tipo' => 'F'
            ],
            [
                'name' => 'Organizador',
                'email' => 'organizador@gmail.com',
                'password' => bcrypt('12345678'),
                'tipo' => 'O'
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
