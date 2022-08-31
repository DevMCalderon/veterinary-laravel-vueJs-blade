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
            'date' => date('Y-m-d'),
            'time' => date('H:i'),
            'waiting_list_status_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
