<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventos=[
            [
                'titulo'=>'Elección Reina Carnaval 2023',
                'descripcion'=>'Se realiza el evento para coronar a la representante del proximo carnaval',
                'tipo'=>false,
                'fecha'=>'2022-09-11 20:00:00',
                'direccion'=>'Casco viejo, primer anillo',
                'gps'=>'-17.7821,-63.1748',
                'estado'=>true
            ],
            [
                'titulo'=>'Cabildo Cruceño',
                'descripcion'=>'Se realiza el evento para definir el accionar para presionar el censo en el 2023',
                'tipo'=>false,
                'fecha'=>'2022-09-30 17:00:00',
                'direccion'=>'Cristo Redentos, segundo anillo',
                'gps'=>'-17.77042,-63.18256',
                'estado'=>true
            ],
        ];
        foreach ($eventos as $evento) {
            Evento::create($evento);
        }
    }
}
