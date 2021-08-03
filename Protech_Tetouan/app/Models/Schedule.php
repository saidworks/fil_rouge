<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ScheduleUnavailability;

class Schedule extends Model
{
    use HasFactory;
    protected $casts = [
        'date' => 'datetime',
        'starts_time' => 'datetime',
        'end_time' => 'datetime',

    ];
    public function unavailabilities(){
        return $this->hasMany(ScheduleUnavailability::class);
    }
}
