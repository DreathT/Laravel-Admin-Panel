<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs') -> insert(
            [
                [
                    'blog_title' => 'Blog_title_1',
                    'blog_slug' => 'blog_slug_1',
                    'blog_file' => null,
                    'blog_must' => '0',
                    'blog_content' => 'blog_Content_1'
                ],
                [
                    'blog_title' => 'Blog_title_2',
                    'blog_slug' => 'blog_slug_2',
                    'blog_file' => null,
                    'blog_must' => '1',
                    'blog_content' => 'blog_Content_2'
                ],
                [
                    'blog_title' => 'Blog_title_3',
                    'blog_slug' => 'blog_slug_3',
                    'blog_file' => null,
                    'blog_must' => '2',
                    'blog_content' => 'blog_Content_3'
                ],
        ]);
    }
}
