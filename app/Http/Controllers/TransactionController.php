<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use App\Models\MyBook;
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

        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $book->price,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' =>  Auth::user()->email,
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $transaction->snap_token = $snapToken;
        $transaction->save();

        return view('transactions.create', compact('transaction', 'book'));
    }

    public function success($transactionId)
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
