<?php

use App\Models\model_wishlist;
use Illuminate\Database\Seeder;

class WishlistTableSeeder extends Seeder
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
                'id_user' => 3,
                'id_dsneaker' => 23
            ],
[
                'id_user' => 3,
                'id_dsneaker' => 33
],
[
                'id_user' => 2,
                'id_dsneaker' => 23
],
[
                'id_user' => 2,
                'id_dsneaker' => 33
],
[
                'id_user' => 1,
                'id_dsneaker' => 22
],
[
                'id_user' => 1,
                'id_dsneaker' => 22
],
[
                'id_user' => 5,
                'id_dsneaker' => 23
],
[
                'id_user' => 5,
                'id_dsneaker' => 23
],
[
                'id_user' => 13,
                'id_dsneaker' => 23
],
[
                'id_user' => 13,
                'id_dsneaker' => 23
],
[
                'id_user' => 13,
                'id_dsneaker' => 23
],
[
                'id_user' => 23,
                'id_dsneaker' => 23
],
[
                'id_user' => 23,
                'id_dsneaker' => 33
],
[
                'id_user' => 22,
                'id_dsneaker' => 23
],
[
                'id_user' => 22,
                'id_dsneaker' => 33
],
[
                'id_user' => 12,
                'id_dsneaker' => 22
],
[
                'id_user' => 12,
                'id_dsneaker' => 22
],
[
                'id_user' => 25,
                'id_dsneaker' => 23
],
[
                'id_user' => 25,
                'id_dsneaker' => 23
],
[
                'id_user' => 10,
                'id_dsneaker' => 23
],
[
                'id_user' => 10,
                'id_dsneaker' => 23
],
[
                'id_user' => 10,
                'id_dsneaker' => 23
],
[
                'id_user' => 3,
                'id_dsneaker' => 3
],
[
                'id_user' => 3,
                'id_dsneaker' => 133
],
[
                'id_user' => 2,
                'id_dsneaker' => 133
],
[
                'id_user' => 2,
                'id_dsneaker' => 133
],
[
                'id_user' => 1,
                'id_dsneaker' => 122
],
[
                'id_user' => 1,
                'id_dsneaker' => 122
],
[
                'id_user' => 5,
                'id_dsneaker' => 123
],
[
                'id_user' => 5,
                'id_dsneaker' => 123
],
[
                'id_user' => 13,
                'id_dsneaker' => 123
],
[
                'id_user' => 13,
                'id_dsneaker' => 123
],
[
                'id_user' => 13,
                'id_dsneaker' => 123
]
        ];

        foreach ($seeds  as $key => $seed) {
            model_wishlist::create($seed);
        }
    }
}
