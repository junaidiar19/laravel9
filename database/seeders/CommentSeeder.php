<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate comments table
        // DB::table('comments')->truncate();

        // definisi faker
        $faker = Factory::create();

        // get data body and user_id
        $body = $faker->sentence;
        $user_id = \App\Models\User::isUser()->inRandomOrder()->first()->id;

        // store to variable
        $attr = [
            'body' => $body,
            'user_id' => $user_id,
        ];

        $blog = Blog::find(1); // get blog where id = 1
        $blog->comments()->create($attr); // insert to comments table where commentable_id = 1 and commentable_type = 'App\Models\Blog'
    }
}
