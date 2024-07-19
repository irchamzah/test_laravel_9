<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'First Post',
            'content' => 'This is the content of the first post.',
            'date' => now(),
            'username' => 'admin',
        ]);

        Post::create([
            'title' => 'Second Post',
            'content' => 'This is the content of the second post.',
            'date' => now(),
            'username' => 'author',
        ]);
    }
}
