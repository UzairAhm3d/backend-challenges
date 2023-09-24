<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shift;

class ShiftSeeder extends Seeder
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
                'title' => 'Morning',
                'start_time' => '10am',
                'end_time' => '5pm'
            ],
            [
                'title' => 'Evening',
                'start_time' => '6pm',
                'end_time' => '12am'
            ]
        ];

        Shift::insert($records);
    }
}
