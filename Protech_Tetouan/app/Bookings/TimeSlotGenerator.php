<?php 

namespace App\Bookings;

use App\Models\ { Schedule, Service};
use Carbon\CarbonInterval;

class TimeSlotGenerator{
    protected $interval;
    public const INCREMENT = 15;
    public function __construct(Schedule $schedule, Service $service)
    {
        $this->interval = CarbonInterval::minutes(self::INCREMENT)
        ->toPeriod(
            $schedule->date->setTimeFrom($schedule->starts_time),
            $schedule->date->setTimeFrom(
                $schedule->end_time->subMinutes($service->duration)
                )
            );
    }

    public function get(){
        return $this->interval;
    }

}