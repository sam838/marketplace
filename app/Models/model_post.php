<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_post extends Model
{
    protected $connection= 'mysql';
    protected $table= 'post';
    protected $primaryKey= 'id_post';
    protected $fillable= [
        'id_post',
        'id_user',
        'total_up',
        'total_down',
        'tgl_post',
        'judul_post',
        'caption_post',
        'id_approver'
    ];
}
