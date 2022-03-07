<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate table blog_category
        DB::table('blog_category')->truncate();

        // definisi model blog dan category
        $blogs = \App\Models\Blog::all();
        $categories = \App\Models\Category::all();

        // setiap blog memiliki beberapa kategori
        foreach($blogs as $blog) {
            $categoryIds = $categories->random(rand(1, 3))->pluck('id')->toArray(); // return collection id of categories
            $blog->categories()->attach($categoryIds); // insert to blog_category table
        }
    }
}
