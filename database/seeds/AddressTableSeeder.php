<?php

use App\Models\model_address;
use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
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
                'id_user' => 3,
                'id_kota' => 41,
                'nama_alamat' => 'Nginden Jaya X/12',
                'kode_pos' => '78022',
            ],
            [
                'id_user' => 4,
                'id_kota' => 12,
                'nama_alamat' => 'Desa Jaya X/12',
                'kode_pos' => '09877',
            ],
        ];

        foreach ($seeds  as $key => $seed) {
            model_address::create($seed);
        }
    }
}
