<?php

namespace Database\Seeders;

use App\Models\Rank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    public function run()
    {
        $ranks = [
            'Стажер',
            'Барбер',
            'Старший барбер',
            'ТОП-барбер',
        ];

        foreach ($ranks as $rank) {
            Rank::create([
                'title' => $rank
            ]);
        }
    }
}
