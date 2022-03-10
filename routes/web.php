<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ExampleController;
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

// Route Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    // route logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('role:user')->group(function() {
        Route::get('/blog', [BlogController::class, 'index'])->name('blog')->middleware('auth');
        Route::get('/blog-detail/{slug}', [BlogController::class, 'detail'])->name('blog.detail')->middleware('auth');
        Route::get('/blog-category/{slug}', [BlogController::class, 'category'])->name('blog.category')->middleware('auth');
        
        Route::get('/kontak', function () {
            return view('contact');
        })->name('contact');
    });

    Route::middleware('role:admin')->group(function() {
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/user/{id}', [UserController::class, 'detail'])->name('users.detail');
        
        // Route Books
        // Route::controller(BookController::class)->group(function() {
        //     Route::get('/books', 'index')->name('books.index');
        //     Route::get('/books/create', 'create')->name('books.create');
        //     Route::post('/books/store', 'store')->name('books.store');
        //     Route::delete('/books/delete/{id}', 'delete')->name('books.delete');
        //     Route::get('/books/edit/{book}', 'edit')->name('books.edit');
        //     Route::put('/books/update/{book}', 'update')->name('books.update');
        // });
        
        // Route Books Controller Resource
        Route::resource('books', BooksController::class);
    });

});


// Route Invokable
Route::get('invokable', ExampleController::class);