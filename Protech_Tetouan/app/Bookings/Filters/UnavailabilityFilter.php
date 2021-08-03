<?php
namespace App\Bookings\Filters;

use App\Bookings\Filter;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;
use App\Bookings\TimeSlotGenerator;

class UnavailabilityFilter implements Filter{
    //pull collection of unavailabilities 
    public function __construct(Collection $unavailabilites)
    {
        $this->unavailabilites = $unavailabilites;
    }

    public function apply(TimeSlotGenerator $generator,CarbonPeriod $interval){
        
        $interval->addFilter(function($slot) use($generator){
            foreach($this->unavailabilites as $unavailability){
                //condition if unavailability start time is 12pm minus increment (30mins) and/or end time is 13pm - increment then return false to hide the slots
                if(
                    $slot->between(
                        $unavailability->schedule->date->setTimeFrom(
                        $unavailability->start_time->subMinutes(
                            $generator->service->duration - $generator::INCREMENT
                        )
                        ),
                        $unavailability->schedule->date->setTimeFrom(
                            
                            $unavailability->end_time->subMinutes($generator::INCREMENT)
                        )
                    )
                    ){
                    return false;
                }
            }
            return true;
        });
    }

}