<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_htrans extends Model
{
    protected $connection= 'mysql';
    protected $table= 'htrans';
    protected $primaryKey= 'id_transaksi';
    protected $fillable= [
        'id_transaksi',
        'id_user',
        'id_kota',
        'tgl_beli',
        'jumlah_barang',
        'total',
        'detail_pengiriman',
        'status_pengiriman',
        'biaya_pengiriman',
        'id_seller',
        'id_addr',
        'resi'
    ];
}
