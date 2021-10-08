<?php

use App\Models\model_user;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
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
                'id_kota' => 41,
                'username' => 'michaeltenoyo',
                'password' => Hash::make('michaeltenoyo'),
                'nama' => 'Michael Tenoyo',
                'email' => 'michaeltenoyo@gmail.com',
                'status_verifikasi' => 1,
                'jenis_user' => 'seller',
                'status_ban' => 0,
                'alamat_user' => 'Desa Api Selatan VI/11'
            ],

            [
                'id_kota' => 13,
                'username' => 'stefanocalvin',
                'password' => Hash::make('stefanocalvin'),
                'nama' => 'Stefano Calvin',
                'email' => 'stefanocalvin@gmail.com',
                'status_verifikasi' => 1,
                'jenis_user' => 'seller',
                'status_ban' => 0,
                'alamat_user' => 'Desa Api Timur VI/11'
            ],

            [
                'id_kota' => 23,
                'username' => 'stevenwang',
                'password' => Hash::make('stevenwang'),
                'nama' => 'Steven Wang',
                'email' => 'stevenwang@gmail.com',
                'status_verifikasi' => 1,
                'jenis_user' => 'customer',
                'status_ban' => 0,
                'alamat_user' => 'Desa Api Timur VI/11'
            ],

            [
                'id_kota' => 33,
                'username' => 'samuelchristian',
                'password' => Hash::make('samuelchristian'),
                'nama' => 'Samuel Christian',
                'email' => 'samuelchristian@gmail.com',
                'status_verifikasi' => 1,
                'jenis_user' => 'customer',
                'status_ban' => 0,
                'alamat_user' => 'Desa Api Barat VI/11'
            ],

            [
                'id_kota' => 1,
                'username' => 'stewy',
                'password' => Hash::make('stevenwang'),
                'nama' => 'Steven Wang',
                'email' => 'stevenwang@gmail.com',
                'status_verifikasi' => 1,
                'jenis_user' => 'customer',
                'status_ban' => 0,
                'alamat_user' => 'Desa Api Timur VI/11'
            ],
            [
                            'id_kota' => 2,
                            'username' => 'sichuan',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 3,
                            'username' => 'stewy12',
                            'password' => Hash::make('stevenwang'),
                            'nama' => 'Steven Wang',
                            'email' => 'stevenwang@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Timur VI/11'
            ],
            [
                            'id_kota' => 4,
                            'username' => 'sichuan22',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 5,
                            'username' => 'tzuyu',
                            'password' => Hash::make('stevenwang'),
                            'nama' => 'Steven Wang',
                            'email' => 'stevenwang@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Timur VI/11'
            ],
            [
                            'id_kota' => 6,
                            'username' => 'tzuyu1212',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 7,
                            'username' => 'dahyun',
                            'password' => Hash::make('stevenwang'),
                            'nama' => 'Steven Wang',
                            'email' => 'stevenwang@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Timur VI/11'
            ],
            [
                            'id_kota' => 7,
                            'username' => 'dahyun111111',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 1,
                            'username' => 'nayeon',
                            'password' => Hash::make('stevenwang'),
                            'nama' => 'Steven Wang',
                            'email' => 'stevenwang@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Timur VI/11'
            ],
            [
                            'id_kota' => 2,
                            'username' => 'taeyoen',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 9,
                            'username' => 'samsam',
                            'password' => Hash::make('stevenwang'),
                            'nama' => 'Steven Wang',
                            'email' => 'stevenwang@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Timur VI/11'
            ],
            [
                            'id_kota' => 9,
                            'username' => 'graceeeee',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 21,
                            'username' => 'gibe',
                            'password' => Hash::make('stevenwang'),
                            'nama' => 'Steven Wang',
                            'email' => 'stevenwang@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Timur VI/11'
            ],
            [
                            'id_kota' => 22,
                            'username' => 'gilbert',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 21,
                            'username' => 'davin',
                            'password' => Hash::make('stevenwang'),
                            'nama' => 'Steven Wang',
                            'email' => 'stevenwang@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Timur VI/11'
            ],
            [
                            'id_kota' => 32,
                            'username' => 'davin_dewa',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 31,
                            'username' => 'yulius',
                            'password' => Hash::make('stevenwang'),
                            'nama' => 'Steven Wang',
                            'email' => 'stevenwang@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Timur VI/11'
            ],
            [
                            'id_kota' => 33,
                            'username' => 'hapzzzzzz',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 41,
                            'username' => 'momo',
                            'password' => Hash::make('stevenwang'),
                            'nama' => 'Steven Wang',
                            'email' => 'stevenwang@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Timur VI/11'
            ],
            [
                            'id_kota' => 44,
                            'username' => 'momochan',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 51,
                            'username' => 'sanachan',
                            'password' => Hash::make('stevenwang'),
                            'nama' => 'Steven Wang',
                            'email' => 'stevenwang@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Timur VI/11'
            ],
            [
                            'id_kota' => 53,
                            'username' => 'sana',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 51,
                            'username' => 'timkuGG',
                            'password' => Hash::make('stevenwang'),
                            'nama' => 'Steven Wang',
                            'email' => 'stevenwang@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Timur VI/11'
            ],
            [
                            'id_kota' => 63,
                            'username' => 'jago',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 63,
                            'username' => 'juaagooo',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'customer',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 73,
                            'username' => 'lapoaku',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 73,
                            'username' => 'timkungethrow',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 63,
                            'username' => 'hidup',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 63,
                            'username' => 'tak_mampu',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 63,
                            'username' => 'mati_pun',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 63,
                            'username' => 'tak_rela',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 83,
                            'username' => 'abed',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 83,
                            'username' => 'ramzez',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 63,
                            'username' => 'ana',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 63,
                            'username' => 'notail',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 11,
                            'username' => 'w33',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 11,
                            'username' => 'miracle',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 13,
                            'username' => 'lulus',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 13,
                            'username' => 'SDP',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 14,
                            'username' => 'micin_jago',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 14,
                            'username' => 'samsung',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 15,
                            'username' => 'oppo',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 65,
                            'username' => 'vivo',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 17,
                            'username' => 'galaxy',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 17,
                            'username' => 'iphone',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 18,
                            'username' => 'adidas',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 18,
                            'username' => 'compass',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 19,
                            'username' => 'rebok',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 19,
                            'username' => 'naiki',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 20,
                            'username' => 'sekecher',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ],
            [
                            'id_kota' => 20,
                            'username' => 'kw_super',
                            'password' => Hash::make('samuelchristian'),
                            'nama' => 'Samuel Christian',
                            'email' => 'samuelchristian@gmail.com',
                            'status_verifikasi' => 1,
                            'jenis_user' => 'seller',
                            'status_ban' => 0,
                            'alamat_user' => 'Desa Api Barat VI/11'
            ]
        ];

        foreach ($seeds  as $key => $seed) {
            model_user::create($seed);
        }
    }
}
