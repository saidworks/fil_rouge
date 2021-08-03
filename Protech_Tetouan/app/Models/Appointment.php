<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'start_time',
        'end_time',
    ];
    protected $casts = [
        'date' => 'datetime',
        'start_time' => 'datetime',
        'end_time' => 'datetime',

    ];
    public static function booted(){
        // when the model is creating call this closure
        static::creating(function($model){
            $model->uuid = Str::uuid();
            $model->token = Str::random(32);
        });
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }

}
