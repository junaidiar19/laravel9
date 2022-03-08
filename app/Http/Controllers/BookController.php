<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(5);

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    public function store(BookRequest $request)
    {
        // Create a new book...
        $attr = $request->all();
        Book::create($attr);

        // Redirect to the book's show page...
        session()->flash('success', 'Book has been created');
        return redirect()->back();
    }
}
