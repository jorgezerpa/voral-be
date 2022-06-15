<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'description'=>$this->faker->text(50),
            'price'=>rand(5,100),
            'image'=>$this->faker->text(30),
            'categorie_id'=>rand(1,10),
        ];
    }
}
