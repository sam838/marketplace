<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_dretur extends Model
{
    protected $connection= 'mysql';
    protected $table= 'dretur';
    protected $primaryKey= null;
    public $incrementing = false;
    protected $fillable= [
        'id_transaksi',
        'id_dsneaker',
        'jumlah',
        'alasan_pengembalian',
        'status_pengembalian',
        'resi_pengembalian',
        'id_seller'
    ];
}
