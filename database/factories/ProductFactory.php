<?php

namespace Database\Factories;

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $factory->define(Product::class, function (Faker $faker){
            return[
                'name' => $faker->word(),
                'description' => $faker->sentence(10),
                'price' => $faker->numberBetween(50,100),
            ];
        });
    }
}
