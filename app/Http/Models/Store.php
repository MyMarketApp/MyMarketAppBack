<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    public $timestamps = false;

    protected $fillable = [
        'name', 'direction', 'imageUrl'
    ];
}
