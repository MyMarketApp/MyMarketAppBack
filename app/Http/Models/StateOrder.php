<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class StateOrder extends Model
{
    //
    protected $table = 'state_orders';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
