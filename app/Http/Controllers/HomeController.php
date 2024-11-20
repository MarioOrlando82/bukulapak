<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');
        $sort = $request->get('sort');

        $query = Book::query();

        if ($category && $category !== 'all') {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            });
        }

        if ($sort == 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort == 'price_desc') {
            $query->orderBy('price', 'desc');
        }

        $books = $query->paginate(12);

        return view('homepage', compact('books'));
    }



    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }
}
