<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model {
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
