<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_address extends Model
{
    protected $connection= 'mysql';
    protected $table = "address";
    protected $primaryKey = "id_addr";
    protected $fillable = [
        'id_addr',
        'id_user',
        'id_kota',
        'nama_alamat',
        'kode_pos'
    ];
}
