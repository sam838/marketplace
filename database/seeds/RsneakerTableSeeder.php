<?php
use App\Models\model_review_sneaker;
use Illuminate\Database\Seeder;

class RsneakerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds= [
            [ 
                'id_sneaker' => 1,
                'id_user' => 12,
                'rate' => 4,
                'komentar_sneaker' => "Saya kasih bintang 4 karena pengiriman yang lama"
            ],
            [ 
                'id_sneaker' => 1,
                'id_user' => 3,
                'rate' => 4,
                'komentar_sneaker' => "Bintang 4 cukup ya"
            ],
            [ 
                'id_sneaker' => 1,
                'id_user' => 13,
                'rate' => 5,
                'komentar_sneaker' => "Top Banget"
            ],
            [ 
                'id_sneaker' => 1,
                'id_user' => 12,
                'rate' => 4,
                'komentar_sneaker' => "memuaskan"
            ],
            [ 
                'id_sneaker' => 1,
                'id_user' => 16,
                'rate' => 4,
                'komentar_sneaker' => "Saya kasih bintang 4 karena pengiriman yang lama"
            ],
            [ 
                'id_sneaker' => 1,
                'id_user' => 12,
                'rate' => 2,
                'komentar_sneaker' => "Tidak sesuai gambar hmmmm..."
            ],
            [ 
                'id_sneaker' => 3,
                'id_user' => 12,
                'rate' => 5,
                'komentar_sneaker' => "memuaskan"
            ],
            [ 
                'id_sneaker' => 3,
                'id_user' => 16,
                'rate' => 4,
                'komentar_sneaker' => "Saya kasih bintang 4 karena pengiriman yang lama"
            ],
            [ 
                'id_sneaker' => 3,
                'id_user' => 12,
                'rate' => 5,
                'komentar_sneaker' => "Tidak sesuai gambar hmmmm..."
            ],
        ];

        foreach ($seeds as $key => $seed) {
            model_review_sneaker::create($seed);
        }
    }
}
