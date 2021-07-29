<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $casts = [
        'date' => 'datetime',
        'starts_time' => 'datetime',
        'end_time' => 'datetime',

    ];
}
