<?php

namespace App\Http\Controllers;

use App\Helpers\UploadImage;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->except('_token');
        // dd($params);

        $books = Book::filter($params)->latest()->paginate(5);

        $categories = Category::all();

        return view('books.index', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        // get all data from request
        $attr = $request->all();

        // validation for image/cover
        $request->validate([
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        // upload to storage cover
        $file = $request->file('cover');
        // $attr['cover'] = $file->store('cover'); // store by default
        $filename = str()->slug($request->title . '-' . str()->random(5));
        $upload = UploadImage::upload($file, 'buku', $filename);
        $attr['cover'] = $upload;

        // Create a new book...
        Book::create($attr);

        // Redirect to the book's show page...
        session()->flash('success', 'Book has been created');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {

        // get all data from request
        $attr = $request->all();

        if ($request->hasFile('cover')) {
            // validation for image/cover
            $request->validate([
                'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);

            // upload to storage cover
            $file = $request->file('cover');
            $filename = str()->slug($request->title . '-' . str()->random(5));
            $upload = UploadImage::upload($file, 'buku', $filename);
            $attr['cover'] = $upload;

            // delete old cover
            $old_cover = $book->cover;
            if($old_cover) {
                Storage::delete($old_cover);
            }
        }

        // Update the book...
        $book->update($attr);

        // Redirect to the book's show page...
        session()->flash('success', 'Book has been updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // delete old cover
        $old_cover = $book->cover;
        if($old_cover) {
            Storage::delete($old_cover);
        }
        // delete book
        $book->delete();

        session()->flash('success', 'Book has been deleted');
        return redirect()->back();
    }
}
