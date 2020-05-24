<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'password','lastName','phone'
    ];
    protected $hidden = [
        'password',
    ];

}
