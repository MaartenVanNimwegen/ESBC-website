<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $table = 'sponsor';

    protected $fillable = [
        'title',
        'picture_location',
        'url'
    ];
}
