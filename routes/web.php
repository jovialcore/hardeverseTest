<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/books/list', [App\Http\Controllers\BookController::class, 'index']);

Route::get('/books/edit/{id}', [App\Http\Controllers\BookController::class, 'edit'])->name('book.edit');

Route::post('/books/update/{id}', [App\Http\Controllers\BookController::class, 'update'])->name('book.update');

Route::get('/books/delete/{id}', [App\Http\Controllers\BookController::class, 'delete'])->name('book.delete');

