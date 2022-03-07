<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
      $active = 'blog';
      $blogs = Blog::latest()->get();

      return view('blogs.index', compact('active', 'blogs'));
    }

    public function detail($slug)
    {
      $blog = Blog::whereSlug($slug)->firstOrFail();

      return view('blogs.detail', compact('blog'));
    }

    public function category($slug)
    {
      $category = Category::whereSlug($slug)->firstOrFail();
      $blogs = $category->blogs()->latest()->get();

      return view('blogs.category', compact('category', 'blogs'));
    }

    // contoh cek unique slug manual
    public function contohStore() {

      $title = 'new blog';
      $slug = $this->uniqueSlug($title);

      $data = [
        'slug' => $slug,
        'title' => $title,
      ];

      Blog::create($data);
    }

    private function uniqueSlug($title) {
      $slug = str()->slug($title);
      $count = Blog::whereSlug($slug)->count();

      if ($count > 0) {
        $slug = $slug . '-' . $count;
      }

      return $slug;
    }
    // end contoh cek unique slug manual

}
