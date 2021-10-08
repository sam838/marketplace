<?php

use App\Models\model_dtrans;
use Illuminate\Database\Seeder;

class DtransTableSeeder extends Seeder
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
                'id_transaksi' => 1,
                'id_dsneaker' => 10,
                'jumlah' => 1,
                'subtotal' => 300000
            ],

            [
                'id_transaksi' => 1,
                'id_dsneaker' => 3,
                'jumlah' => 1,
                'subtotal' => 300000
            ],

            [
                'id_transaksi' => 1,
                'id_dsneaker' => 16,
                'jumlah' => 1,
                'subtotal' => 1480000
            ],

            [
                'id_transaksi' => 1,
                'id_dsneaker' => 32,
                'jumlah' => 1,
                'subtotal' => 999000
            ],

            [
                'id_transaksi' => 2,
                'id_dsneaker' => 97,
                'jumlah' => 1,
                'subtotal' => 999000
            ],
            [
                'id_transaksi' => 3,
                'id_dsneaker' => 5,
                'jumlah' => 1,
                'subtotal' => 300000
            ],

            [
                'id_transaksi' => 3,
                'id_dsneaker' => 127,
                'jumlah' => 1,
                'subtotal' => 9399000
            ]
        ];

        foreach ($seeds  as $key => $seed) {
            model_dtrans::create($seed);
        }
    }
}
