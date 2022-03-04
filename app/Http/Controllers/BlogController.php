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

      return view('blog', compact('active', 'blogs'));
    }
}
