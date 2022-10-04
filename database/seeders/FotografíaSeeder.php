<?php

namespace Database\Seeders;

use App\Models\Fotografía;
use Illuminate\Database\Seeder;

class FotografíaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fotografias=[
            [
                'dimension'=>'634x358',
                'tipo'=>false,
                'url'=>'https://eju.tv/wp-content/uploads/2021/09/reina-del-carnaval.jpg',
                'fotografo_id'=>1
            ],
            [
                'dimension'=>'1024x683',
                'tipo'=>false,
                'url'=>'https://cdn.diariodeavisos.com/wp-content/uploads/2022/06/RS685242_fp-candidata-1101-scr-1024x683.jpg',
                'fotografo_id'=>1
            ],
            [
                'dimension'=>'480x649',
                'tipo'=>false,
                'url'=>'http://cd1.eju.tv/wp-content/uploads/2019/12/cabildo.jpg',
                'fotografo_id'=>2
            ],
            //¨¨
            [
                'dimension'=>'1000x750',
                'tipo'=>false,
                'url'=>' https://miviaje.com/wp-content/uploads/2019/07/santa-cruz-sierra-bolivia.jpg',
                'fotografo_id'=>1
            ],
            [
                'dimension'=>'1320x880',
                'tipo'=>false,
                'url'=>'https://phantom-marca.unidadeditorial.es/03eb87501d21adafdb9b04a42d413549/resize/1320/f/jpg/assets/multimedia/imagenes/2022/09/24/16639964481622.jpg',
                'fotografo_id'=>2
            ],
            [
                'dimension'=>'990x556',
                'tipo'=>false,
                'url'=>'https://imagenes.20minutos.es/files/image_990_v3/uploads/imagenes/2020/07/09/daddy-yankee.jpeg',
                'fotografo_id'=>2
            ],

            [
                'dimension'=>'800x503',
                'tipo'=>false,
                'url'=>'https://www.fayerwayer.com/resizer/s690xaNDgSmjaFebMnCxHp7duCg=/800x0/filters:format(jpg):quality(70)/cloudfront-us-east-1.images.arcpublishing.com/metroworldnews/NOAC3M3RXJDCTPJFNBZGZISON4.jpg',
                'fotografo_id'=>1
            ],
            [
                'dimension'=>'1200x800',
                'tipo'=>false,
                'url'=>'https://www.viajarmiami.com/img/guia-viaje-miami.jpg',
                'fotografo_id'=>2
            ],
            [
                'dimension'=>'1024x576',
                'tipo'=>false,
                'url'=>'https://static.dw.com/image/59739999_101.jpg',
                'fotografo_id'=>2
            ],
            
           
        ];
        foreach ($fotografias as $fotografia) {
            Fotografía::create($fotografia);
        }
    }
}
