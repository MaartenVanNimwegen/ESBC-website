<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    protected $table = 'signups';

    protected $fillable = [
        'NLvoornaam',
        'NLachternaam',
        'NLemail',
        'NLemailOudersVoogd',
        'NLpostcode',
        'NLhuisnummer',
        'NLgeboortedatum',
        'NLgeslacht',
        'NLtelefoonnummer',
        'RHvoorletterachternaam',
        'RHiban',
        'RHtelefoon',
        'RHemail',
        'RHtype',
        'RHpasfoto',
        'functies',
    ];
}
