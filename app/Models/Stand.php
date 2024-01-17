<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    protected $fillable = [
        'rang',
        'afko',
        'gespeeld',
        'punten',
        'eigenScore',
        'tegenScore',
        'saldo',
    ];
}
