<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word(),
            'image'=>'https://i0.wp.com/decoraciondetortasweb.com/wp-content/uploads/2019/06/Ponquesitos-De-Chocolate.png?ssl=1'
        ];
    }
}
