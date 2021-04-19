<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable
{
    use  Notifiable;
    protected $fillable = ['name', 'email','password','phone','address'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
