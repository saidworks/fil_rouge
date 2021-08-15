<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Carbon\CarbonInterval;

class BookingCalendar extends Component
{

    // Building the dynamic UI for the calendar
    public $date;
    public $calendarStartDate; 
    public $service;
    public $employee;
    public $time;  

     /**
     * mount lifecycle hook
     *
     * @return void
     */
    public function mount(){
        $this->calendarStartDate = now(); // return a carbon instance
        $this->setDate(now()->timestamp);
    } 
    
    
    public function updatedTime($time){
        // get time property when updated then emit it to parent
        $this->emitUp('updated-booking-time',$time);
    }
    /**
     * get Employee Schedule using the employee props and db
     * relationships
     * @return void
     */
    public function getEmployeeScheduleProperty(){
        return $this->employee->schedules()
        ->whereDate('date',$this->calendarSelectedDateObject)
        ->first();
    }
    public function getAvailableTimeSlotsProperty(){
        if(!$this->employee || !$this->employeeSchedule){
            return collect(); 
        }
        // return available slots using the available slots method in the employee model (the one I moved from the controller)
        return $this->employee->availableSlots($this->service,$this->employeeSchedule);
    }
    /**
     * convert timestamp to an actual date
     *
     * @return void
     */
    public function getCalendarSelectedDateObjectProperty(){
        return Carbon::createFromTimeStamp($this->date);
    }    
     
        
    /**
     * setDate when clicked on day nb
     *
     * @param  mixed $timestamp
     * @return void
     */
    public function setDate($timestamp){
        $this->date = $timestamp;
    }
    /**
     * increment by one week when clicking
     * chevron right icon
     * @return void
     */
    public function incrementCalendarWeek(){
        $this->calendarStartDate->addWeek()->addDay();
    }

    public function decrementCalendarWeek(){
        $this->calendarStartDate->subWeek()->addDay();
    }

    public function getWeekIsGreaterThanCurrentProperty(){
        return $this->calendarStartDate->gt(now());
    }
    /**
     * generate days of the week 
     *
     * @return void
     */
    public function getCalendarWeekIntervalProperty(){
        return CarbonInterval::days(1)
            ->toPeriod(
                $this->calendarStartDate,
                $this->calendarStartDate->clone()->addWeek()
            );
    }

   
        
    public function render()
    {
        return view('livewire.booking-calendar');
    }
}
