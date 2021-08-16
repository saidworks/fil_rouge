<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $date = Carbon::now();
        for($i = 0; $i < 3; $i++){
            $date->hour = 9;
            $date->minute = 0;
            $date->second = 0;
        }
        // $startDate = Carbon::createFromTimeStamp($faker->dateTimeBetween('-30 days', '+30 days')->getTimestamp());
        // $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addHour();
        return [
            'employee_id' => 4,
            'date' => $date->addDay()->format('Y-m-d'),
            'starts_time' => $date->format('H:i:s'),
            'end_time' => $date->addhours(10)->format('H:i:s'),
        ];
    }
}
