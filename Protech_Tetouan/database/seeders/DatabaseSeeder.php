<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        for($i = 0; $i < 365; $i++){
            $date->hour = 9;
            $date->minute = 0;
            $date->second = 0;
             // \App\Models\User::factory(10)->create();
        \App\Models\Schedule::factory(1)->create([
            'employee_id' => 1,
            'date' => $date->addDay()->format('Y-m-d'),
            'starts_time' => $date->format('H:i:s'),
            'end_time' => $date->addhours(10)->format('H:i:s'),
        ]);
        }
       
    }
}
