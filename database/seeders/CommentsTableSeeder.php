<?php

namespace Database\Seeders;

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

    }
}
