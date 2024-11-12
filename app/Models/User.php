<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authable;

class User extends Authable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public static function findByEmailOrUsername($emailOrUsername){
        return self::where('username', $emailOrUsername)->orWhere('email', $emailOrUsername)->first();
    }
}
