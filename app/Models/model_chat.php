<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_chat extends Model
{
    protected $connection= 'mysql';
    protected $table = "chat";
    protected $primarykey = "id_chat";
    protected $fillable = [
        'id_chat',
        'id_user',
        'id_tujuan',
        'isi_chat',
        'tgl_chat'
    ];
}
