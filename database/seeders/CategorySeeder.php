<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attr = [
            [
                'slug' => 'laravel',
                'name' => 'Laravel',
            ],
            [
                'slug' => 'node-js',
                'name' => 'Node JS',
            ]
        ];

        \App\Models\Category::create($attr); // insert multiple rows
        // \App\Models\Category::create($attr); // create one row
    }
}
