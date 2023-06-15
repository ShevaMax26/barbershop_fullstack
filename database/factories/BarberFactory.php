<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Rank;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barber>
 */
class BarberFactory extends Factory
{
    public function definition()
    {
        $ranks = Rank::pluck('id')->toArray();
        $branches = Branch::pluck('id')->toArray();

        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'phone' => $this->faker->numerify('#########'),
            'rank_id' => $this->faker->randomElement($ranks),
            'branch_id' => $this->faker->randomElement($branches),
        ];
    }
}
