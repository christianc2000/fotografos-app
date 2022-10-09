<?php

namespace Database\Seeders;

use App\Models\EventoFotografo;
use App\Models\Fotografía;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(EventoSeeder::class);
        $this->call(FotografoSeeder::class);
        $this->call(EventoFotografoSeeder::class);
        $this->call(FotografíaSeeder::class);
        $this->call(FotoAguaSeeder::class);
    }
}
