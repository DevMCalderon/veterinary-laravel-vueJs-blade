<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
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
            'code' => $this->faker->creditCardNumber(),
            'price' => $this->faker->randomNumber(2).".".$this->faker->randomNumber(2),
            'image' => '',
            'category_id' => ProductCategory::inRandomOrder()->first()->id,
        ];
    }
}
