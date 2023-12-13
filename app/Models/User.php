<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable {
    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
        'password_code',
        'role',
    ];

    public function hasRole($role) {
        return $this->role === $role;
    }
}
