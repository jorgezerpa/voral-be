<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Categorie::factory(10)->create();
        \App\Models\Product::factory(20)->create();
        \App\Models\User::factory(1)->create();
        \App\Models\Order::factory(5)->create();
    }
}
