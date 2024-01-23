<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = "trainingen";
    protected $fillable = [
        'team_id',
        'day',
        'start',
        'end',
        'trainer'
    ];

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
