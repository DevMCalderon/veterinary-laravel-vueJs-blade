<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class WaitingListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => Client::all()->random()->id,
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'waiting_list_status_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
