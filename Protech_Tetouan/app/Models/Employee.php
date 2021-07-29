<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ {Service,Schedule};

class Employee extends Model
{
    use HasFactory;
    public function services(){
        return $this->belongsTo(Service::class);
    }
    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
}
