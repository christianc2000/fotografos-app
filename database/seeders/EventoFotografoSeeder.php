<?php

namespace Database\Seeders;

use App\Models\EventoFotografo;
use Illuminate\Database\Seeder;

class EventoFotografoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $efs = [
            [
                'evento_id' => 1,
                'fotografo_id' => 1,
            ],
            [
                'evento_id' => 1,
                'fotografo_id' => 2,
            ],
            [
                'evento_id' => 2,
                'fotografo_id' => 1,
            ]
        ];
        foreach ($efs as $ef) {
            EventoFotografo::create($ef);
        }
    }
}
