<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Post_Tag;
use App\Models\Tag;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create users
        User::factory(10)->create();

        // Create tags (10 predefined tags)
        $tags = [
            'Technology',
            'Health',
            'Science',
            'Education',
            'Travel',
            'Finance',
            'Entertainment',
            'Food',
            'Art',
            'Sports',
        ];

        foreach ($tags as $tagName) {
            Tag::create(['name' => $tagName]);
        }

        // Create posts
        $posts = Post::factory(20)->create();

        // Attach tags randomly to posts (each post gets 1-3 tags)
        $allTagIds = Tag::pluck('id')->toArray();

        foreach ($posts as $post) {
            $randomTagIds = collect($allTagIds)->random(rand(1, 3))->toArray();
            $post->tags()->attach($randomTagIds);
        }
    }
}
