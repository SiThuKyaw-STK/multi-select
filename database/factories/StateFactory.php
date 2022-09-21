<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class StateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $state = $this->faker->city();
        return [
            "name" => $state,
            "country_id" => Country::inRandomOrder()->first()->id,
        ];
    }
}
