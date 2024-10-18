<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create();
        return [
            //
            'title' => $faker->sentence(3),
            'ISBN' => $faker->isbn13(),
            'author' => $faker->name(),
            'publisher' => $faker->company(),
            'price' => random_int(10000, 600000)
        ];
    }
}
