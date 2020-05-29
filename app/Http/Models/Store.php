<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    public $timestamps = false;

    protected $fillable = [
        'name', 'adress', 'imageUrl', 'coordinates'
    ];

    public function products(){
        return $this->belongsToMany('App\Http\Models\Product', 'product_store', 'idStore', 'idProduct')
                                    ->withPivot('quantity');
    }
}
