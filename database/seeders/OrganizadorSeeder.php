<?php

namespace Database\Seeders;

use App\Models\Organizador;
use Illuminate\Database\Seeder;

class OrganizadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organizador::create([
            'user_id'=>3
        ]);
    }
}
