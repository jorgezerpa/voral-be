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
            'name'=>'Product Name',
            'description'=>'a really delicious product description thath will send all this products',
            'price'=>rand(5,100),
            'size'=>'size',
            'image'=>'https://i0.wp.com/decoraciondetortasweb.com/wp-content/uploads/2019/06/Ponquesitos-De-Chocolate.png?ssl=1',
            'categorie_id'=>rand(1,10),
        ];
    }
}
