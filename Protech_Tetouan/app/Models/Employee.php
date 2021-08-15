<?php

namespace App\Models;

use Carbon\Carbon;
use App\Bookings\TimeSlotGenerator;
use Illuminate\Database\Eloquent\Model;
use App\Bookings\Filters\AppointmentFilter;
use App\Bookings\Filters\UnavailabilityFilter;
use App\Models\ {Service,Schedule,Appointment};
use App\Bookings\Filters\SlotsPassedTodayFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    public function availableSlots(Service $service,Schedule $schedule){
        // use schedule and service to generate slots after filtering them using filters
        return (new TimeSlotGenerator($schedule,$service))
            ->applyFilters([
                new SlotsPassedTodayFilter(),
                new UnavailabilityFilter($schedule->unavailabilities),
                new AppointmentFilter($this->appointmentsForDate($schedule->date))
                ]
            )
            ->get();
    }
    public function appointmentsForDate(Carbon $date){
        // added a scope not cancelled 
        return $this->appointments()->notCancelled()->whereDate('date',$date)->get();
    }
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
    public function services(){
        return $this->belongsToMany(Service::class);
    }
    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
}
