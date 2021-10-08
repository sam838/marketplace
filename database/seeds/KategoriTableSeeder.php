<?php

use App\Models\model_kategori;
use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds= [
            ['nama_kategori' => 'Athletic Men'],
            ['nama_kategori' => 'Plimsoll Men'],
            ['nama_kategori' => 'Hightop Men'],
            ['nama_kategori' => 'Community Design Men'],
            ['nama_kategori' => 'Athletic Women'],
            ['nama_kategori' => 'Plimsoll Women'],
            ['nama_kategori' => 'Hightop Women'],
            ['nama_kategori' => 'Community Design Women'],
        ];

        foreach ($seeds  as $key => $seed) {
            model_kategori::create($seed);
        }
    }
}
