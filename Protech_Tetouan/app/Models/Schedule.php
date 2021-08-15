<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ScheduleUnavailability;

class Schedule extends Model
{
    use HasFactory;
       
    /**
     * casts Accessors and mutators allow you to format Eloquent attributes when retrieving them from a model or setting their value. For example, you may want to use the Laravel encrypter to encrypt a value while it is stored in the database, and then automatically decrypt the attribute when you access it on an Eloquent model.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime',
        'starts_time' => 'datetime',
        'end_time' => 'datetime',

    ];
    public function unavailabilities(){
        return $this->hasMany(ScheduleUnavailability::class);
    }
}
