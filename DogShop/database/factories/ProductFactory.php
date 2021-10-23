<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
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
        return [
            'user_id' => User::role('vendor')->first(),
            'name' => $this->faker->word,
            'description' => $this->faker->sentences(3, true),
            'price' => $this->faker->randomFloat(2, 10, 500),
            'image' => 'product-images/9vlld5WIlT1sF3M7wqPDOgkkM1WSFGGQcLNaq8q0.png',
            'available' => '1',
            'available_from' => $this->faker->dateTimeBetween('-2 months'),
        ];
    }
}
