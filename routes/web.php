<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/bookList', [BookController::class, 'index']);
Route::get('/book-add', [BookController::class, 'create']); //ke add book page
Route::post('/addBook',[BookController::class, 'store']); //add ke db

Route::get('/book-update/{id}',[BookController::class, 'edit']); //ke edit book page
Route::put('/updateBook/{id}', [BookController::class, 'update']); //upd ke db