<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create specific categories with fixed IDs
        $categories = [
            ['id' => 1, 'name' => 'Educational'],
            ['id' => 2, 'name' => 'Novel'],
            ['id' => 3, 'name' => 'Comic'],
            ['id' => 4, 'name' => 'Inspirational'],
            ['id' => 5, 'name' => 'Kid'],
        ];

        // Insert categories with specific ids
        foreach ($categories as $categoryData) {
            Category::firstOrCreate([
                'id' => $categoryData['id'],
                'name' => $categoryData['name']
            ]);
        }

        // Fetch all categories after seeding
        $categories = Category::all();

        // Create books and assign category_id manually
        Book::factory(20)->create()->each(function ($book) use ($categories) {
            // Assign a random category_id from the created categories
            $book->category_id = $categories->random()->id;
            $book->save();  // Save the book with the assigned category_id
        });

        // Create users and associate them with books
        User::factory(10)->create()->each(function ($user) {
            // Attach random books to the user using the belongsToMany relationship
            $user->books()->attach(Book::all()->random(3));  // Attach random books to the user

            // Create reviews and transactions
            Review::factory(5)->create([
                'user_id' => $user->id,
                'book_id' => Book::all()->random()->id,
            ]);

            Transaction::factory(3)->create([
                'user_id' => $user->id,
                'book_id' => Book::all()->random()->id,
            ]);
        });

        // Create an admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
    }
}
