<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cart'=>'[
                {
                "name"=>"Product Name",
                "description"=>"a really delicious product description thath will send all this products",
                "price"=>rand(5,100),
                "size"=>"size",
                "image"=>"https://i0.wp.com/decoraciondetortasweb.com/wp-content/uploads/2019/06/Ponquesitos-De-Chocolate.png?ssl=1",
                "categorie_id"=>rand(1,10),
                }
            ]', //create 4  mock products
            'addressInfo'=>'{address info}', //create address info
            'contactInfo'=>'{ contact info}', //create contact info
            'paymentInfo'=>'{payment info}', //create payment info
            'status'=> 'holded' //[ holded, canceled, success ]
        ];

    }
}
