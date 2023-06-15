<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run()
    {
        $branches = [
            'GC barbershop пр-т Волі',
            'GC barbershop ПортСіті',
            'GC barbershop Виниченка',
            'GC barbershop Яровиця',
        ];

        foreach ($branches as $branch) {
            Branch::create([
                'title' => $branch
            ]);
        }
    }
}
