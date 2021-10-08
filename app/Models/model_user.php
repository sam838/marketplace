<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_user extends Model
{
    protected $connection= 'mysql';
    protected $table= 'user';
    protected $primaryKey= 'id_user';
    protected $fillable= [
        'id_user',
        'id_kota',
        'username',
        'password',
        'nama',
        'email',
        'status_verifikasi',
        'jenis_user',
        'status_ban',
        'alamat_user'
    ];
}
