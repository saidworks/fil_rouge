<?php

namespace App\Bookings;
use App\Bookings\TimeSlotGenerator;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;

interface Filter{

    public function apply(TimeSlotGenerator $generator,CarbonPeriod $interval);
}