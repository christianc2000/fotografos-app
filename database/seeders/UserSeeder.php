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
        User::create(
            [
                'name' => 'Christian',
                'email' => 'christian@gmail.com',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Fotoajax',
                'email' => 'fotoajax@gmail.com',
                'password' => bcrypt('12345678')
            ]
        );
    }
}
