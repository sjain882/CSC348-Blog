<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Create admin role
        $adminRole = new Role;
        $adminRole->name = "Admin";
        $adminRole->save();

        // Create moderator role
        $moderatorRole = new Role;
        $moderatorRole->name = "Moderator";
        $moderatorRole->save();

        // Create user role
        $userRole = new Role;
        $userRole->name = "User";
        $userRole->save();

        // Create muted role
        $mutedRole = new Role;
        $mutedRole->name = "Muted";
        $mutedRole->save();
        
    }
}
