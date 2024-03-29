<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = [
        'name',
        'plg_ID',
        'cmp_ID',
        'picture_location'
    ];

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
}
