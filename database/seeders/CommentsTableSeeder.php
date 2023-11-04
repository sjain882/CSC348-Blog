<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add a comment to the first post ever created
        $firstPostComment = new Comment;
        $firstPostComment->body = 'I commented first!';
        $firstPostComment->post_id = 7;
        $firstPostComment->user_id = 1;
        $firstPostComment->save();

        // Add a comment to a random post, authored by a random user
        $firstPostComment = new Comment;
        $firstPostComment->body = fake()->sentence(1);
        $firstPostComment->post_id = fake()->numberBetween(1, (Post::get()->count()));
        $firstPostComment->user_id = fake()->numberBetween(1, (User::get()->count()));
        $firstPostComment->save();

        // Add 3 random comments to random posts
        Comment::factory()
            ->count(3)
            ->create();

    }
}
