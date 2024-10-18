<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    //
    public function index (){
        $bookList = Book::get();
        return view('book/book-home', ['bookList' => $bookList]);
    }

    public function create (){
        return view('book/book-add');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'max:50|required',
            'ISBN'=> 'unique:books|max:20|required',
            'author' => 'required',
            'publisher' => 'required',
            'price' => 'integer|required',
        ]);

        $book = Book::create($request->all());

        if ($book){
            Session::flash('status', 'success'); 
            Session::flash('message', 'add new book success');
        }

        return redirect('/bookList');
    }

    public function edit($id){
        $book = Book::findOrFail($id);
        return view('book/book-update', ['bookDetail' => $book]);
    }

    public function update(Request $request, $id){

        $book = Book::findOrFail($id);

        $book->update($request->all());
        return redirect('/bookList');
    }
}
