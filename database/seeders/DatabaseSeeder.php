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
        $categories = Category::factory(5)->create();

        $books = Book::factory(20)->create([
            'category_id' => $categories->random()->id,
        ]);

        User::factory(10)->create()->each(function ($user) use ($books) {
            $user->myBooks()->attach($books->random(3));

            Review::factory(5)->create([
                'user_id' => $user->id,
                'book_id' => $books->random()->id,
            ]);

            Transaction::factory(3)->create([
                'user_id' => $user->id,
                'book_id' => $books->random()->id,
            ]);
        });

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
    }
}
