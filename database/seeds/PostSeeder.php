<?php

use Illuminate\Database\Seeder;
use App\Models\model_post;

class PostSeeder extends Seeder
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
                'id_user' => 2,
                'total_up' => 15,
                'total_down' => 239,
                'tgl_post' => date("Y/m/d"),
                'judul_post' => 'Sneaker Top di Daerah Medaeng',
                'caption_post' => 'Kenapa belum ada sneaker, yang setuju sneaker ini di jual mana suaranya!',
                'id_approver' => 2
            ],

            [
                'id_user' => 3,
                'total_up' => 340,
                'total_down' => 21,
                'tgl_post' => date("Y/m/d"),
                'judul_post' => 'Design Tugas DKV 2019',
                'caption_post' => 'Tolong kritik dan sarannya mengenai design saya!',
                'id_approver' => 0
            ],

            [
                'id_user' => 3,
                'total_up' => 1334,
                'total_down' => 23,
                'tgl_post' => date("Y/m/d"),
                'judul_post' => 'Sneaker Lomba DesignFest 2020',
                'caption_post' => '#DesignFest 2020 #sneakersurabaya #sneaker',
                'id_approver' => 0
            ],

            [
                'id_user' => 2,
                'total_up' => 324,
                'total_down' => 322,
                'tgl_post' => date("Y/m/d"),
                'judul_post' => 'Sneaker Killer',
                'caption_post' => 'Siapa yang setuju sneaker ini dijual!?',
                'id_approver' => 1
            ],

            [
                'id_user' => 2,
                'total_up' => 23,
                'total_down' => 1,
                'tgl_post' => date("Y/m/d"),
                'judul_post' => 'Post Iseng',
                'caption_post' => 'no capt.',
                'id_approver' => 0
            ]
        ];

        foreach ($seeds  as $key => $seed) {
            model_post::create($seed);
        }
    }
}
