<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'client_id' => $this->faker->randomNumber(2),
            'total' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'iva' => $this->faker->numberBetween($min = 1, $max = 100),
            'vendedor_id' => User::inRandomOrder()->first()->id,
            'tipo_pago' => 'Efectivo',
        ];
    }
}