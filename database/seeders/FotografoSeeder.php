<?php

namespace Database\Seeders;

use App\Models\Fotografo;
use Illuminate\Database\Seeder;

class FotografoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fotografos = [
            [
                'biografia' => 'Realizo trabajos como fotografo profesional desde hace mas de 3 años, realizé talleres con fotografos de la serie de vuelta al barrio',
                'user_id' => 1
            ],
            [
                'biografia' => 'Con experiencia en eventos del gobierno durante 5 años, y también en spot de Coca Cola',
                'user_id' => 2
            ],
        ];
        foreach ($fotografos as $fotografo) {
            Fotografo::create($fotografo);
        }
    }
}
