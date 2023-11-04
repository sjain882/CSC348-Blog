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
        // Initialisation
        $roleSize = (Role::get()->count());
        $adminrole = Role::find($roleSize - ($roleSize - 1));   // Role 1: Admin
        $moderatorRole = Role::find($roleSize - ($roleSize - 2));   // Role 2: Moderator
        $userRole = Role::find($roleSize - ($roleSize - 3));   // Role 3: User

        // Create admin user
        $adminUser = new User;
        $adminUser->name = "Admin";
        $adminUser->email = fake()->unique()->safeEmail();
        $adminUser->password = bcrypt('changeme');
        $adminUser->picture = null;
        $adminUser->save();

        // Assign relevant roles
        $adminUser->roles()->save($adminrole);
        $adminUser->roles()->save($moderatorRole);
        $adminUser->roles()->save($userRole);
        $adminUser->save();

        // Create 3 random 'fake' users
        User::factory()
            ->count(3)
            ->create();

    }
}
