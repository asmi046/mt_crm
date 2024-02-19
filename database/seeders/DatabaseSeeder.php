<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BusSeeder::class,
            DirectionSeeder::class,
            ReisSeeder::class,
            PunktSeeder::class,
            HotelSeeder::class,
            UserSeeder::class,
        ]);

    }
}
