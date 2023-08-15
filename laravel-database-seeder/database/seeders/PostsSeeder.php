<?php
namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Database\Seeder;
class PostsSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => 'Post 1',
            'description' => 'Description for post 1',
            'body' => 'Body for post 1'
        ]);

        Post::create([
            'title' => 'Post 2',
            'description' => 'Description for post 2',
            'body' => 'Body for post 2'
        ]);

        Post::create([
            'title' => 'Post 3',
            'description' => 'Description for post 3',
            'body' => 'Body for post 3'
        ]);

        Post::create([
            'title' => 'Post 4',
            'description' => 'Description for post 4',
            'body' => 'Body for post 4'
        ]);

        Post::create([
            'title' => 'Post 5',
            'description' => 'Description for post 5',
            'body' => 'Body for post 5'
        ]);
    }
}