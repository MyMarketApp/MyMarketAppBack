<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'password','lastName','phone','adress','coordinates'
    ];
    protected $hidden = [
        'password',
    ];

    public function orders()
    {
        return $this->hasMany('App\Http\Models\Order','idUser','id');
    }

}
