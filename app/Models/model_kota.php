<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_kota extends Model
{
    protected $connection= 'mysql';
    protected $table= 'kota';
    protected $primaryKey= 'id_kota';
    protected $fillable= [
        'id_kota',
        'id_provinsi',
        'nama_kota',
    ];
}
