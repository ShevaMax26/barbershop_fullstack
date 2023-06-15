<?php

namespace Database\Seeders;

use App\Models\Barber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarberSeeder extends Seeder
{
    public function run()
    {
        $barbers = [
            [
                'name' => 'Євген',
                'surname' => 'Федорук',
                'phone' => 111111111,
                'rank_id' => 4,
                'branch_id' => 1,
            ],
            [
                'name' => 'Артем',
                'surname' => 'Гриценко',
                'phone' => 222222222,
                'rank_id' => 4,
                'branch_id' => 2,
            ],
            [
                'name' => 'Микола',
                'surname' => 'Давінчі',
                'phone' => 333333,
                'rank_id' => 4,
                'branch_id' => 1,
            ],
        ];

        foreach ($barbers as $barber) {
            Barber::create($barber);
        }
    }
}
