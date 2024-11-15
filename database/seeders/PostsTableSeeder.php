<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the first post
        $firstPost = new Post;
        $firstPost->title = "Hello world!";
        $firstPost->body = "This is the first ever blog post!";
        $firstPost->image_path = null;
        $firstPost->user_id = 1;        // Default admin user
        $firstPost->save();

        // Create a post made by a random user
        $secondPost = new Post;
        $secondPost->title = "Greetings all!";
        $secondPost->body = "This is the second ever blog post!";
        $secondPost->image_path = null;
        $secondPost->user_id = fake()->numberBetween(1, (User::get()->count())); // Random user
        $secondPost->save();

        // Create a post made by a random user with random contents
        $thirdPost = new Post;
        $thirdPost->title = fake()->sentence(1);
        $thirdPost->body = fake()->paragraph(2);
        $thirdPost->image_path = null;
        $thirdPost->user_id = fake()->numberBetween(1, (User::get()->count())); // Random user
        $thirdPost->save();

        // Create 5 random posts without comments
        Post::factory()
            ->count(5)
            ->create();

        // Create 5 random posts, each with 2 random comments
        Post::factory()
            ->count(5)
            ->has(Comment::factory()->count(2))
            ->create();

    }

}
