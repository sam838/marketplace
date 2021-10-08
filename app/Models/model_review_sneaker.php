<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_review_sneaker extends Model
{
    protected $connection= 'mysql';
    protected $table= 'review_sneaker';
    protected $primaryKey= 'id_rsneaker';
    protected $fillable= [
        'id_rsneaker',
        'id_sneaker',
        'id_user',
        'rate',
        'komentar_sneaker'
    ];
}
