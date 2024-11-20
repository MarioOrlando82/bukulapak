<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
            'cover_image' => 'required|image',
            'pdf_file' => 'required|file|mimes:pdf',
            'price' => 'required|numeric',
        ]);

        $coverImagePath = $request->file('cover_image')->store('cover_images');
        $pdfFilePath = $request->file('pdf_file')->store('pdfs');

        Book::create(array_merge($request->all(), [
            'cover_image' => $coverImagePath,
            'pdf_file' => $pdfFilePath,
        ]));

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('cover_images');
            $book->cover_image = $coverImagePath;
        }

        if ($request->hasFile('pdf_file')) {
            $pdfFilePath = $request->file('pdf_file')->store('pdfs');
            $book->pdf_file = $pdfFilePath;
        }

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
