<?php

use Illuminate\Database\Seeder;
use App\Models\model_htrans;

class HtransTableSeeder extends Seeder
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
                'id_kota' => 23,
                'tgl_beli' => date("Y/m/d"),
                'jumlah_barang' => 4,
                'total' => 3079000,
                'detail_pengiriman' => 'Diterima oleh Wilbert S.',
                'status_pengiriman' => 'SENDING',
                'biaya_pengiriman' => 30000,
                'id_seller' => 1,
                'id_addr' => 1,
                'resi' => '011610031880520'
            ],

            [
                'id_user' => 4,
                'id_kota' => 13,
                'tgl_beli' => date("Y/m/d"),
                'jumlah_barang' => 4,
                'total' => 16299000,
                'detail_pengiriman' => 'Diterima oleh JNE OFFICE-SURABAYA PUCANG',
                'status_pengiriman' => 'DIKEMAS',
                'biaya_pengiriman' => 30000,
                'id_seller' => 2,
                'id_addr' => 2,
                'resi' => 'none'
            ],

            [
                'id_user' => 3,
                'id_kota' => 23,
                'tgl_beli' => date("Y/m/d"),
                'jumlah_barang' => 2,
                'total' => 9699000,
                'detail_pengiriman' => 'none',
                'status_pengiriman' => 'BAYAR',
                'biaya_pengiriman' => 30000,
                'id_seller' => 1,
                'id_addr' => 2,
                'resi' => '3032999039122'
            ],

            [
                'id_user' => 3,
                'id_kota' => 23,
                'tgl_beli' => date("Y/m/d"),
                'jumlah_barang' => 2,
                'total' => 2340000,
                'detail_pengiriman' => 'none',
                'status_pengiriman' => 'DONE',
                'biaya_pengiriman' => 30000,
                'id_seller' => 2,
                'id_addr' => 2,
                'resi' => '3032999039122'
            ],

            [
                'id_user' => 5,
                'id_kota' => 23,
                'tgl_beli' => date("Y/m/d"),
                'jumlah_barang' => 2,
                'total' => 300000,
                'detail_pengiriman' => 'none',
                'status_pengiriman' => 'DONE',
                'biaya_pengiriman' => 30000,
                'id_seller' => 16,
                'id_addr' => 2,
                'resi' => '3032999039122'
            ],

            [
                'id_user' => 7,
                'id_kota' => 23,
                'tgl_beli' => date("Y/m/d"),
                'jumlah_barang' => 2,
                'total' => 1350000,
                'detail_pengiriman' => 'none',
                'status_pengiriman' => 'DONE',
                'biaya_pengiriman' => 30000,
                'id_seller' => 11,
                'id_addr' => 2,
                'resi' => '3032999039122'
            ],

            [
                'id_user' => 7,
                'id_kota' => 23,
                'tgl_beli' => date("Y/m/d"),
                'jumlah_barang' => 2,
                'total' => 245000,
                'detail_pengiriman' => 'none',
                'status_pengiriman' => 'DONE',
                'biaya_pengiriman' => 30000,
                'id_seller' => 11,
                'id_addr' => 2,
                'resi' => '3032999039122'
            ],
            
        ];
        foreach ($seeds  as $key => $seed) {
            model_htrans::create($seed);
        }
    }
}
