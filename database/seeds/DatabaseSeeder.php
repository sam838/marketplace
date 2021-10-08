<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProvinsiTableSeeder::class,
            KotaTableSeeder::class,
            UserTableSeeder::class,
            KategoriTableSeeder::class,
            SneakerTableSeeder::class,
            DsneakerTableSeeder::class,
            PostSeeder::class,
            HtransTableSeeder::class,
            DtransTableSeeder::class,
            AddressTableSeeder::class,
            WishlistTableSeeder::class,
            RsneakerTableSeeder::class
        ]);
    }
}
