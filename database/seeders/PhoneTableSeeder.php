<?php

namespace Database\Seeders;

use App\Models\Phone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Add the first phone number to the database
        $firstNumber = new Phone;
        $firstNumber->phone_num = "+44 1632 960413";
        $firstNumber->user_id = 1;        // Default admin user
        $firsfirstNumberPost->save();

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

    }
}
