<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog-detail/{slug}', [BlogController::class, 'detail'])->name('blog.detail');
Route::get('/blog-category/{slug}', [BlogController::class, 'category'])->name('blog.category');

Route::get('/kontak', function () {
    return view('contact');
})->name('contact');

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/user/{id}', [UserController::class, 'detail'])->name('users.detail');

// Route Books
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
Route::delete('/books/delete/{id}', [BookController::class, 'delete'])->name('books.delete');
Route::get('/books/edit/{book}', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/update/{book}', [BookController::class, 'update'])->name('books.update');