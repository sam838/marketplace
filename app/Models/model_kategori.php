<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_kategori extends Model
{
    protected $connection= 'mysql';
    protected $table= 'kategori';
    protected $primaryKey= 'id_kategori';
    protected $fillable= [
        'id_kategori',
        'nama_kategori'
    ];
}
