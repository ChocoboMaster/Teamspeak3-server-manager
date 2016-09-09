<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable, LaratrustUserTrait;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password'
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];
}
