<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'category_id' => Category::all()->random()->id,
            'description' => $this->faker->paragraph(2),
            'cover_image' => 'cover_images/suntzu.jpg',
            'pdf_file' => 'pdfs/suntzu.pdf',
            'price' => $this->faker->randomFloat(null, 20000, 500000),
        ];
    }
}
