<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'mobile', 'email', 'address', 'password'];

    protected $hidden = ['password']; // Hides password in API responses

    protected $casts = [
        'password' => 'string', // Prevent Laravel from auto-hashing
    ];
}

