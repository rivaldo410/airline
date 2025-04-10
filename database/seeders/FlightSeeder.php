<?php

namespace Database\Seeders;

use App\Models\Flight;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    public function run(): void
    {
        $flights = [
            [
                'flight_code' => 'JT610',
                'origin' => 'SUB',
                'destination' => 'CGK',
                'departure_time' => Carbon::now()->addDays(1)->setTime(13, 0),
                'arrival_time' => Carbon::now()->addDays(1)->setTime(16, 0),
            ],
            [
                'flight_code' => 'GA212',
                'origin' => 'SUB',
                'destination' => 'KLN',
                'departure_time' => Carbon::now()->addDays(2)->setTime(14, 30),
                'arrival_time' => Carbon::now()->addDays(2)->setTime(18, 30),
            ],
            [
                'flight_code' => 'SA601',
                'origin' => 'SUB',
                'destination' => 'SIN',
                'departure_time' => Carbon::now()->addDays(3)->setTime(8, 15),
                'arrival_time' => Carbon::now()->addDays(3)->setTime(11, 15),
            ],
            [
                'flight_code' => 'JT501',
                'origin' => 'SUB',
                'destination' => 'CGK',
                'departure_time' => Carbon::now()->addDays(4)->setTime(10, 0),
                'arrival_time' => Carbon::now()->addDays(4)->setTime(13, 0),
            ],
            [
                'flight_code' => 'QG307',
                'origin' => 'SUB',
                'destination' => 'DPS',
                'departure_time' => Carbon::now()->addDays(5)->setTime(16, 45),
                'arrival_time' => Carbon::now()->addDays(5)->setTime(18, 45),
            ],
        ];

        foreach ($flights as $flight) {
            Flight::create($flight);
        }
    }
}