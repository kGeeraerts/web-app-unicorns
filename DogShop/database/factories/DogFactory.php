<?php

namespace Database\Factories;

use App\Models\Dog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DogFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'user_id' => User::role('vendor')->first(),
            'name' => pick_dog(),
            'description' => $this->faker->sentences(3, true),
            'price' => $this->faker->randomFloat(2, 250, 2500),
            'image' => '/dog-images/ErBaGaneQQZFMki3DghB2xqmKYYAZ8ytMvK2IunF.jpg',
            'available' => '1',
            'available_from' => $this->faker->dateTimeBetween('-2 months'),

        ];
    }
}
