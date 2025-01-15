<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('books/borrowers', [BooksController::class, 'borrowers'])->name('books.borrowers');

Route::post('books/borrowers', [BooksController::class, 'borrowersStore'])->name('books.store-borrowers');

Route::put('books/toggle-read', [BooksController::class, 'toggleRead'])->name('books.toggle-read');



Route::resource('books', BooksController::class);

