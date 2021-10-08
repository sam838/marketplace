<?php

use App\Models\model_sneaker;
use Illuminate\Database\Seeder;

class SneakerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds= [
            //Athletic Men
            [
                'id_user' => 1,
                'id_kategori' => 1,
                'nama_sneaker' => 'Avia O2 Air',
                'brand_sneaker' => 'AVIA',
                'harga_sneaker' => 300000,
            ],
            [
                'id_user' => 1,
                'id_kategori' => 1,
                'nama_sneaker' => 'Swift Run',
                'brand_sneaker' => 'ADIDAS',
                'harga_sneaker' => 1480000,
            ],
            //Plimsoll Men
            [
                'id_user' => 1,
                'id_kategori' => 2,
                'nama_sneaker' => 'Chuck Taylor Street Core',
                'brand_sneaker' => 'CONVERSE',
                'harga_sneaker' => 999000,
            ],
            [
                'id_user' => 1,
                'id_kategori' => 2,
                'nama_sneaker' => 'Court Vision Low',
                'brand_sneaker' => 'NIKE',
                'harga_sneaker' => 1799000,
            ],
            //Hightop Men
            [
                'id_user' => 1,
                'id_kategori' => 3,
                'nama_sneaker' => 'Entrap High Top',
                'brand_sneaker' => 'ADIDAS',
                'harga_sneaker' => 1099000,
            ],
            [
                'id_user' => 1,
                'id_kategori' => 3,
                'nama_sneaker' => 'Timberland High Top',
                'brand_sneaker' => 'MARBLESEA',
                'harga_sneaker' => 399000,
            ],
            //Athletic Women
            [
                'id_user' => 2,
                'id_kategori' => 5,
                'nama_sneaker' => 'Carina Suede Trainers',
                'brand_sneaker' => 'PUMA',
                'harga_sneaker' => 799000,
            ],
            [
                'id_user' => 2,
                'id_kategori' => 5,
                'nama_sneaker' => 'Women Rose Gold Ribbon',
                'brand_sneaker' => 'CARMILLA',
                'harga_sneaker' => 399000,
            ],
            //hightop and plimsoll Women
            [
                'id_user' => 2,
                'id_kategori' => 6,
                'nama_sneaker' => 'Sorento Crystal',
                'brand_sneaker' => 'DOLCE&GABBANA',
                'harga_sneaker' => 16299000,
            ],
            [
                'id_user' => 2,
                'id_kategori' => 7,
                'nama_sneaker' => 'Deluxe May Glitter',
                'brand_sneaker' => 'GOLDEN GOOSE',
                'harga_sneaker' => 9399000,
            ],
        ];

        foreach ($seeds  as $key => $seed) {
            model_sneaker::create($seed);
        }
    }
}
