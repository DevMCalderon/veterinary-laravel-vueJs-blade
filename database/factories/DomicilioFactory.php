<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DomicilioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street' => $this->faker->sentence(4),
            'num_interior' => $this->faker->randomNumber(3, true),
            'num_exterior' => $this->faker->randomNumber(3, true),
            'cp' => $this->faker->randomNumber(5, true),
            'country' => '1',
            'state' => '1',
            'city' => '1',
        ];
    }
}
