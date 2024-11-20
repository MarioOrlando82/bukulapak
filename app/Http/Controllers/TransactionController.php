<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use App\Models\MyBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function create($bookId)
    {
        $book = Book::findOrFail($bookId);

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'amount' => $book->price,
            'payment_status' => 'pending',
        ]);

        return view('transactions.create', compact('transaction', 'book'));
    }

    public function success(Request $request, $transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);

        if ($transaction->payment_status !== 'completed') {
            $transaction->update(['payment_status' => 'completed']);

            MyBook::create([
                'user_id' => $transaction->user_id,
                'book_id' => $transaction->book_id,
            ]);
        }

        return redirect()->route('my-books.index')->with('success', 'Book added to your library!');
    }

    public function myBooks()
    {
        $myBooks = MyBook::where('user_id', Auth::id())->with('book')->get();
        return view('my-books.index', compact('myBooks'));
    }
}
