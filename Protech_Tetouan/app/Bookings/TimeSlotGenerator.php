<?php 

namespace App\Bookings;

use App\Models\ { Schedule, Service};
use Carbon\CarbonInterval;

class TimeSlotGenerator{
    protected $interval;
    public const INCREMENT = 15;
    public $schedule;
    public $service;
    public function __construct(Schedule $schedule, Service $service)
    {
        $this->schedule = $schedule;
        $this->service = $service;
        //generate slots 
        $this->interval = CarbonInterval::minutes(self::INCREMENT)
        ->toPeriod(
            $schedule->date->setTimeFrom($schedule->starts_time),
            $schedule->date->setTimeFrom(
                $schedule->end_time->subMinutes($service->duration)
                )
            );
    }
    public function applyFilters(array $filters){
        foreach($filters as $filter){
            if(!$filter instanceof Filter){
                continue;
            }
            $filter->apply($this,$this->interval);
        }
        return $this;
    }
    public function get(){
        return $this->interval;
    }

}