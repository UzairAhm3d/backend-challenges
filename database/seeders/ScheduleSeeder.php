<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [
                'employee_id' =>  1,
                'location_id' =>  random_int(1, 3),
                'shift_id' =>  random_int(1, 2)
            ],
            [
                'employee_id' =>  2,
                'location_id' =>  random_int(1, 3),
                'shift_id' =>  random_int(1, 2)
            ],
            [
                'employee_id' =>  3,
                'location_id' =>  random_int(1, 3),
                'shift_id' =>  random_int(1, 2)
            ]
        ];

        Schedule::insert($records);
    }
}
