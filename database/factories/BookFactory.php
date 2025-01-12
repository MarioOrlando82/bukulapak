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
        $images = [
            'suntzu.jpg',
            'compiler.jpg',
            'harrypotter.jpg',
            'percyjackson.jpg',
        ];

        $randomImage = $images[array_rand($images)];

        $coverImage = base64_encode(file_get_contents(public_path('storage/cover_images/' . $randomImage)));

        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'category_id' => Category::all()->random()->id,
            'description' => $this->faker->paragraph(2),
            'cover_image' => $coverImage,
            'pdf_file' => base64_encode(file_get_contents(public_path('storage/pdfs/suntzu.pdf'))),
            'price' => $this->faker->numberBetween(20000, 500000),
        ];
    }
}
