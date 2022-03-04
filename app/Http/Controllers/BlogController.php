<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
}
