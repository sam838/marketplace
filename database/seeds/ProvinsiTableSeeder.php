<?php
use App\Models\model_provinsi;
use Illuminate\Database\Seeder;

class ProvinsiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds= [
            [ 'nama_provinsi' => 'Aceh'],
            [ 'nama_provinsi' => 'Bali'],
            [ 'nama_provinsi' => 'Bangka Belitung'],
            [ 'nama_provinsi' => 'Banten'],
            [ 'nama_provinsi' => 'Bengkulu'],
            [ 'nama_provinsi' => 'Gorontalo'],
            [ 'nama_provinsi' => 'DKI Jakarta'],
            [ 'nama_provinsi' => 'Jambi'],
            [ 'nama_provinsi' => 'Jawa Barat'],
            [ 'nama_provinsi' => 'Jawa Tengah'],
            [ 'nama_provinsi' => 'Jawa Timur'],
            [ 'nama_provinsi' => 'Kalimantan Barat'],
            [ 'nama_provinsi' => 'Kalimantan Selatan'],
            [ 'nama_provinsi' => 'Kalimantan Tengah'],
            [ 'nama_provinsi' => 'Kalimantan Timur'],
            [ 'nama_provinsi' => 'Kalimantan Utara'],
            [ 'nama_provinsi' => 'Kepulauan Riau'],
            [ 'nama_provinsi' => 'Lampung'],
            [ 'nama_provinsi' => 'Maluku Utara'],
            [ 'nama_provinsi' => 'Maluku'],
            [ 'nama_provinsi' => 'Nusa Tenggara Barat'],
            [ 'nama_provinsi' => 'Nusa Tenggara Timur'],
            [ 'nama_provinsi' => 'Papua Barat'],
            [ 'nama_provinsi' => 'Papua'],
            [ 'nama_provinsi' => 'Riau'],
            [ 'nama_provinsi' => 'Sulawesi Selatan'],
            [ 'nama_provinsi' => 'Sulawesi Tengah'],
            [ 'nama_provinsi' => 'Sulawesi Tenggara'],
            [ 'nama_provinsi' => 'Sulawesi Utara'],
            [ 'nama_provinsi' => 'Sumatra Barat'],
            [ 'nama_provinsi' => 'Sumatra Selatan'],
            [ 'nama_provinsi' => 'Sumatra Utara'],
            [ 'nama_provinsi' => 'Yogyakarta']
        ];

        foreach ($seeds as $key => $seed) {
            model_provinsi::create($seed);
        }
    }
}
