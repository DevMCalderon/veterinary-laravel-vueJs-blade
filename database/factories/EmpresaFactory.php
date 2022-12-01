<?php

namespace Database\Factories;

use App\Models\Domicilio;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'logo' => '',
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'rfc' => $this->faker->bothify('????#######?#'),
            'razon_social' => $this->faker->sentence(4),
            'admin_id' => null,
            'domicilio_empresa_id' => Domicilio::all()->random()->id,
            'domicilio_fiscal_id' => Domicilio::all()->random()->id
        ];
    }
}
