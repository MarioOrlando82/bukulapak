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
        $categories = [
            ['id' => 1, 'name' => 'Educational'],
            ['id' => 2, 'name' => 'Novel'],
            ['id' => 3, 'name' => 'Comic'],
            ['id' => 4, 'name' => 'Inspirational'],
            ['id' => 5, 'name' => 'Kid'],
        ];

        foreach ($categories as $categoryData) {
            Category::firstOrCreate([
                'id' => $categoryData['id'],
                'name' => $categoryData['name']
            ]);
        }

        $categories = Category::all();

        Book::factory(20)->create()->each(function ($book) use ($categories) {
            $book->category_id = $categories->random()->id;
            $book->save();
        });

        User::factory(10)->create()->each(function ($user) {
            $user->books()->attach(Book::all()->random(3));

            Review::factory(5)->create([
                'user_id' => $user->id,
                'book_id' => Book::all()->random()->id,
            ]);

            Transaction::factory(3)->create([
                'user_id' => $user->id,
                'book_id' => Book::all()->random()->id,
            ]);
        });

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'role' => 'user',
        ]);
    }
}
