<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'picture',
        'duration'
    ];
    public function employees(){
        return $this->belongsToMany(Employee::class);
    }
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
