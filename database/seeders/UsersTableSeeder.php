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

        // Create 3 random 'fake' users
        User::factory()
            ->count(3)
            ->create();

    }
}
