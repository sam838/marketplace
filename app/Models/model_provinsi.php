<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_provinsi extends Model
{
    protected $connection= 'mysql';
    protected $table= 'provinsi';
    protected $primaryKey= 'id_provinsi';
    protected $fillable= [
        'id_provinsi',
        'nama_provinsi',
    ];
}
