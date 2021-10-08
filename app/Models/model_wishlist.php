<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class model_wishlist extends Model
{
    protected $connection= 'mysql';
    protected $table= 'wishlist';
    protected $primaryKey= 'id_wishlist';
    protected $fillable= [
        'id_wishlist',
        'id_user',
        'id_dsneaker'
    ];
}
