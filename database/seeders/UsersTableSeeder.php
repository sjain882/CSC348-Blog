<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleSize = (Role::get()->count());
        $adminrole = Role::find($roleSize - ($roleSize - 1));   // Role 1: Admin
        $moderatorRole = Role::find($roleSize - ($roleSize - 2));   // Role 2: Moderator
        $userRole = Role::find($roleSize - ($roleSize - 3));   // Role 3: User

        // Create admin user
        $a = new User;
        $a->name = "Admin";
        $a->email = fake()->unique()->safeEmail();
        $a->password = bcrypt('changeme');
        $a->picture = null;
        $a->save();

        // Assign relevant roles
        $a->roles()->save($adminrole);
        $a->roles()->save($moderatorRole);
        $a->roles()->save($userRole);
        $a->save();

        // Random role choice of 2: Moderator, 3: User and 4: Muted (inclusive)
        // Unused: $randomRole = Role::find(rand(($roleSize - ($roleSize - 2)), $roleSize));
        $randomRole = Role::find(fake()->numberBetween(2,4));

        User::factory()
             ->count(3)
             ->hasAttached($randomRole)
             ->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
