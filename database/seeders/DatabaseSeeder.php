<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Barber;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BranchSeeder::class,
            RankSeeder::class,
            ServiceSeeder::class,
            BarberSeeder::class,
        ]);

        Barber::factory(5)->create();
    }
}
