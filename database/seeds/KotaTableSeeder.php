<?php

use App\Models\model_kota;
use Illuminate\Database\Seeder;

class KotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds= [
            [ 'id_provinsi' => 1, 'nama_kota' => 'Banda Aceh' ],
            [ 'id_provinsi' => 1, 'nama_kota' => 'Langsa' ],
            [ 'id_provinsi' => 1, 'nama_kota' => 'Lhokseumawe' ],
            [ 'id_provinsi' => 1, 'nama_kota' => 'Meulaboh' ],
            [ 'id_provinsi' => 1, 'nama_kota' => 'Sabang' ],
            [ 'id_provinsi' => 1, 'nama_kota' => 'Subulussalam' ],
            [ 'id_provinsi' => 2, 'nama_kota' => 'Denpasar' ],
            [ 'id_provinsi' => 3, 'nama_kota' => 'Pangkal Pinang' ],
            [ 'id_provinsi' => 4, 'nama_kota' => 'Cilegon' ],
            [ 'id_provinsi' => 4, 'nama_kota' => 'Serang' ],
            [ 'id_provinsi' => 4, 'nama_kota' => 'Tangerang' ],
            [ 'id_provinsi' => 5, 'nama_kota' => 'Bengkulu'  ],
            [ 'id_provinsi' => 6, 'nama_kota' => 'Gorontalo' ],
            [ 'id_provinsi' => 7, 'nama_kota' => 'Jakarta' ],
            [ 'id_provinsi' => 8, 'nama_kota' => 'Sungai Penuh' ],
            [ 'id_provinsi' => 8, 'nama_kota' => 'Jambi' ],
            [ 'id_provinsi' => 9, 'nama_kota' => 'Bandung' ],
            [ 'id_provinsi' => 9, 'nama_kota' => 'Bekasi' ],
            [ 'id_provinsi' => 9, 'nama_kota' => 'Bogor' ],
            [ 'id_provinsi' => 9, 'nama_kota' => 'Cimahi' ],
            [ 'id_provinsi' => 9, 'nama_kota' => 'Cirebon' ],
            [ 'id_provinsi' => 9, 'nama_kota' => 'Depok' ],
            [ 'id_provinsi' => 9, 'nama_kota' => 'Sukabumi' ],
            [ 'id_provinsi' => 9, 'nama_kota' => 'Tasikmalaya' ],
            [ 'id_provinsi' => 9, 'nama_kota' => 'Banjar' ],
            [ 'id_provinsi' => 10, 'nama_kota' => 'Magelang' ],
            [ 'id_provinsi' => 10, 'nama_kota' => 'Pekalongan' ],
            [ 'id_provinsi' => 10, 'nama_kota' => 'Purwokerto' ],
            [ 'id_provinsi' => 10, 'nama_kota' => 'Salatiga' ],
            [ 'id_provinsi' => 10, 'nama_kota' => 'Semarang' ],
            [ 'id_provinsi' => 10, 'nama_kota' => 'Surakarta' ],
            [ 'id_provinsi' => 10, 'nama_kota' => 'Tegal' ],
            [ 'id_provinsi' => 11, 'nama_kota' => 'Batu' ],
            [ 'id_provinsi' => 11, 'nama_kota' => 'Blitar' ],
            [ 'id_provinsi' => 11, 'nama_kota' => 'Kediri' ],
            [ 'id_provinsi' => 11, 'nama_kota' => 'Madiun' ],
            [ 'id_provinsi' => 11, 'nama_kota' => 'Malang' ],
            [ 'id_provinsi' => 11, 'nama_kota' => 'Mojokerto' ],
            [ 'id_provinsi' => 11, 'nama_kota' => 'Pasuruan' ],
            [ 'id_provinsi' => 11, 'nama_kota' => 'Probolinggo' ],
            [ 'id_provinsi' => 11, 'nama_kota' => 'Surabaya' ],
            [ 'id_provinsi' => 12, 'nama_kota' => 'Pontianak' ],
            [ 'id_provinsi' => 12, 'nama_kota' => 'Singkawang' ],
            [ 'id_provinsi' => 13, 'nama_kota' => 'Banjarbaru' ],
            [ 'id_provinsi' => 13, 'nama_kota' => 'Banjarmasin' ],
            [ 'id_provinsi' => 14, 'nama_kota' => 'Palangkaraya' ],
            [ 'id_provinsi' => 15, 'nama_kota' => 'Balikpapan' ],
            [ 'id_provinsi' => 15, 'nama_kota' => 'Bontang' ],
            [ 'id_provinsi' => 15, 'nama_kota' => 'Samarinda' ],
            [ 'id_provinsi' => 16, 'nama_kota' => 'Tarakan' ],
            [ 'id_provinsi' => 17, 'nama_kota' => 'Batam' ],
            [ 'id_provinsi' => 17, 'nama_kota' => 'Tanjungpinang' ],
            [ 'id_provinsi' => 18, 'nama_kota' => 'Bandar Lampung' ],
            [ 'id_provinsi' => 18, 'nama_kota' => 'Metro' ],
            [ 'id_provinsi' => 19, 'nama_kota' => 'Ternate' ],
            [ 'id_provinsi' => 19, 'nama_kota' => 'Tidore Kepulauan' ],
            [ 'id_provinsi' => 20, 'nama_kota' => 'Ambon' ],
            [ 'id_provinsi' => 20, 'nama_kota' => 'Tual' ],
            [ 'id_provinsi' => 21, 'nama_kota' => 'Bima' ],
            [ 'id_provinsi' => 21, 'nama_kota' => 'Mataram' ],
            [ 'id_provinsi' => 22, 'nama_kota' => 'Kupang' ],
            [ 'id_provinsi' => 23, 'nama_kota' => 'Sorong' ],
            [ 'id_provinsi' => 24, 'nama_kota' => 'Jayapura' ],
            [ 'id_provinsi' => 25, 'nama_kota' => 'Dumai' ],
            [ 'id_provinsi' => 25, 'nama_kota' => 'Pekanbaru' ],
            [ 'id_provinsi' => 26, 'nama_kota' => 'Makassar' ],
            [ 'id_provinsi' => 26, 'nama_kota' => 'Palopo' ],
            [ 'id_provinsi' => 26, 'nama_kota' => 'Parepare' ],
            [ 'id_provinsi' => 27, 'nama_kota' => 'Palu '],
            [ 'id_provinsi' => 28, 'nama_kota' => 'Bau-Bau' ],
            [ 'id_provinsi' => 28, 'nama_kota' => 'Kendari' ],
            [ 'id_provinsi' => 29, 'nama_kota' => 'Bitung' ],
            [ 'id_provinsi' => 29, 'nama_kota' => 'Kotamobagu' ],
            [ 'id_provinsi' => 29, 'nama_kota' => 'Manado' ],
            [ 'id_provinsi' => 29, 'nama_kota' => 'Tomohon' ],
            [ 'id_provinsi' => 30, 'nama_kota' => 'Bukittinggi' ],
            [ 'id_provinsi' => 30, 'nama_kota' => 'Padang' ],
            [ 'id_provinsi' => 30, 'nama_kota' => 'Padangpanjang' ],
            [ 'id_provinsi' => 30, 'nama_kota' => 'Pariaman' ],
            [ 'id_provinsi' => 30, 'nama_kota' => 'Payakumbuh' ],
            [ 'id_provinsi' => 30, 'nama_kota' => 'Sawahlunto' ],
            [ 'id_provinsi' => 30, 'nama_kota' => 'Solok' ],
            [ 'id_provinsi' => 31, 'nama_kota' => 'Lubuklinggau' ],
            [ 'id_provinsi' => 31, 'nama_kota' => 'Pagaralam' ],
            [ 'id_provinsi' => 31, 'nama_kota' => 'Palembang' ],
            [ 'id_provinsi' => 31, 'nama_kota' => 'Prabumulih' ],
            [ 'id_provinsi' => 32, 'nama_kota' => 'Binjai' ],
            [ 'id_provinsi' => 32, 'nama_kota' => 'Medan' ],
            [ 'id_provinsi' => 32, 'nama_kota' => 'Padang Sidempuan' ],
            [ 'id_provinsi' => 32, 'nama_kota' => 'Pematangsiantar' ],
            [ 'id_provinsi' => 32, 'nama_kota' => 'Sibolga' ],
            [ 'id_provinsi' => 32, 'nama_kota' => 'Tanjungbalai' ],
            [ 'id_provinsi' => 32, 'nama_kota' => 'Tebingtinggi' ],
            [ 'id_provinsi' => 33, 'nama_kota' => 'Yogyakarta' ]
        ];

        foreach ($seeds  as $key => $seed) {
            model_kota::create($seed);
        }
    }
}
