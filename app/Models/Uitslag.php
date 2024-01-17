<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uitslag extends Model
{
    protected $fillable = [
        'Thuisteam',
        'Uitteam',
        'ScoreThuis',
        'ScoreUit',
    ];
}
