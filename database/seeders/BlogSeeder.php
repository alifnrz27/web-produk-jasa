<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $blogs = [
            [
                'title' => 'Perayaan Tahun Baru 2025',
                'slug' => 'Selamat Tahun Baru 2025',
                'image' => '',
                'content' => ''
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
