<?php

namespace App\Http\Controllers;

use App\Bookings\Filters\AppointmentFilter;
use App\Models\Service;
use App\Models\Schedule;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use App\Bookings\TimeSlotGenerator;
use App\Http\Controllers\Controller;
use App\Bookings\Filters\UnavailabilityFilter;
use App\Bookings\Filters\SlotsPassedTodayFilter;
use App\Models\Appointment;
use App\Models\Employee;

class BookingController extends Controller
{
    public function __invoke()
    {
        // find today's schedule and service info 
        $schedule = Schedule::find(6);
        $service = Service::find(4);
        // //grab appointments manually for now 
        // $appointments = Appointment::whereDate('date','2021-08-02')->get();
        $employee = Employee::find(1);
        // pass service first then schedule
        $slots = $employee->availableSlots($service,$schedule);
               
        return view('bookings.create',compact('slots'));
    }
}
