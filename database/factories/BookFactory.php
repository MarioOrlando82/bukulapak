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
            'category_id' => Category::factory(),
            'description' => $this->faker->paragraph(),
            'cover_image' => 'covers/' . $this->faker->image('public/storage/covers', 400, 300, null, false),
            'pdf_file' => 'pdfs/' . $this->faker->uuid() . '.pdf',
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
