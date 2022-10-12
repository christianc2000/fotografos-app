<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'user_id' => 4,
            'url' => 'https://res.cloudinary.com/doxlbgstv/image/upload/v1665560872/WhatsApp_Image_2022-03-22_at_13.24.31_brqn7m.jpg'
        ]);
        Cliente::create([
            'user_id' => 5,
            'url' => 'https://res.cloudinary.com/doxlbgstv/image/upload/v1665435137/b7kzqq9xq70gy08pyp85.jpg'
        ]);
    }
}
