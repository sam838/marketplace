<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_dtrans extends Model
{
    protected $connection= 'mysql';
    protected $table= 'dtrans';
    protected $primaryKey= null;
    public $incrementing = false;
    protected $fillable= [
        'id_transaksi',
        'id_dsneaker',
        'jumlah',
        'subtotal'
    ];
}
