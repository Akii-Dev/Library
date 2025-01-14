<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('books/borrowers', [BooksController::class, 'borrowers'])->name('books.borrowers');

Route::put('books/toggle-read', [BooksController::class, 'toggleRead'])->name('books.toggle-read');



Route::resource('books', BooksController::class);

