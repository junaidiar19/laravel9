<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'kode' => 'required|unique:books',
            'title' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            // 'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|numeric',
            'published' => 'boolean',
        ], [], [
            'Kode' => 'Kode',
            'title' => 'Judul',
            'qty' => 'Jumlah',
            'price' => 'Harga',
            'category_id' => 'Kategori',
        ]);

        // dd($validate);

        // Create a new book...
        $attr = $request->all();
        Book::create($attr);

        // Redirect to the book's show page...
        session()->flash('success', 'Book has been created');
        return redirect()->back();
    }
}
