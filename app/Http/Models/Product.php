<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    public $timestamps = false;

    protected $fillable = [
        'name', 'description', 'price', 'idCategory'. 'imageUrl'
    ];

    public function category()
    {
        return $this->belongsTo('App\Http\Models\CategoryProduct','idCategory','id');
    }

    public function stores(){
        return $this->belongsToMany('App\Http\Models\Store', 'product_store', 'idStore','idProduct')
                                    ->withPivot('quantity');
    }
}
