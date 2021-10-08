<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_review_post extends Model
{
    protected $connection= 'mysql';
    protected $table= 'review_post';
    protected $primaryKey= 'id_rpost';
    protected $fillable= [
        'id_rpost',
        'id_user',
        'id_post',
        'komentar_post',
        'thumbs',
        'status_claim',
        'rpost_up',
        'rpost_down'
    ];
}
