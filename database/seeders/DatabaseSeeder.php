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

        // Random role choice of 2: Moderator, 3: User and 4: Muted (inclusive)
        // Unused: $randomRole = Role::find(rand(($roleSize - ($roleSize - 2)), $roleSize));
        $randomRole = Role::find(fake()->numberBetween(2,4));

        User::factory()
             ->count(3)
             ->create();

        $this->call(PostsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
