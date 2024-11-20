<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [HomeController::class, 'show'])->name('book.show');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Guest Routes
Route::middleware('guest')->group(function () {

});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/transactions/create/{book}', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions/success/{transaction}', [TransactionController::class, 'success'])->name('transactions.success');
    Route::get('/my-books', [TransactionController::class, 'myBooks'])->name('my-books.index');
});

// Admin Routes
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin-panel', function () {
        return view('admin.admin-panel');
    })->name('admin.panel');
    Route::resource('/admin/categories', CategoryController::class);
    Route::resource('/admin/books', BookController::class);
});

// User Routes
Route::middleware(['auth', IsUser::class])->group(function () {

});
