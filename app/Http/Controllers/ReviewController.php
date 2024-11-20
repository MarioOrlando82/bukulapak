<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'content' => 'required|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $book->reviews()->create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'rating' => $request->rating,
        ]);

        return redirect()->route('book.show', $book)->with('success', 'Review added successfully!');
    }

    public function edit(Review $review)
    {
        if (Auth::user()->id !== $review->user_id) {
            return redirect()
                ->route('books.show', $review->book_id)
                ->with('error', 'You are not authorized to edit this review.');
        }

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        if (Auth::user()->id !== $review->user_id) {
            return redirect()
                ->route('books.show', $review->book_id)
                ->with('error', 'You are not authorized to update this review.');
        }

        $request->validate([
            'content' => 'required|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review->update([
            'content' => $request->content,
            'rating' => $request->rating,
        ]);

        return redirect()
            ->route('books.show', $review->book_id)
            ->with('success', 'Review updated successfully!');
    }

    public function destroy(Review $review)
    {
        if (Auth::user()->id !== $review->user_id) {
            return redirect()
                ->route('books.show', $review->book_id)
                ->with('error', 'You are not authorized to delete this review.');
        }

        $review->delete();

        return redirect()
            ->route('books.show', $review->book_id)
            ->with('success', 'Review deleted successfully!');
    }
}
