<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Employee::factory()->count(10)->create();

        $records = [
            [
                'name' => "Enoch O'Kon",
                'email' => "enochkon@gmail.com",
                'password' => Hash::make('passowrd')
            ],
            [
                'name' => "Dashawn Kunze",
                'email' => "deshawn@gmail.com",
                'password' => Hash::make('passowrd')
            ],
            [
                'name' => "Everett King",
                'email' => "everett@gmail.com",
                'password' => Hash::make('passowrd')
            ],
            [
                'name' => "Mr. Amari Cronin",
                'email' => "amaricronin@gmail.com",
                'password' => Hash::make('passowrd')
            ],
            [
                'name' => "Muriel Gerlach",
                'email' => "murielgerlach@gmail.com",
                'password' => Hash::make('passowrd')
            ]
        ];

        Employee::insert($records);
    }
}
