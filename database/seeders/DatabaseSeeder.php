<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        User::factory()
             ->count(3)
             ->create();

        $this->call(PostsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
