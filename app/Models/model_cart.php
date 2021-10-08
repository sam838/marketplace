<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_cart extends Model
{
    protected $connection= 'mysql';
    protected $table = "cart";
    protected $primaryKey = "id_cart";
    public $incrementing = true;
    protected $fillable = [
        'id_cart',
        'id_user',
        'id_dsneaker',
        'jumlah',
        'subtotal',
        'id_seller'
    ];
}
