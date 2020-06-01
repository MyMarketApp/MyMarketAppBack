<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';

    public $timestamps = false;

    protected $fillable = [
        'quantity', 'idStore', 'idProduct', 'idState', 'idUser'    ];
}
