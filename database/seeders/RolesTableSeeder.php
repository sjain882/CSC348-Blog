<?php

namespace Database\Seeders;

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
        $a = new Role;
        $a->name = "Admin";
        $a->save();

        // Create moderator role
        $a = new Role;
        $a->name = "Moderator";
        $a->save();

        // Create user role
        $a = new Role;
        $a->name = "User";
        $a->save();

        // Create muted role
        $a = new Role;
        $a->name = "Muted";
        $a->save();
        
    }
}
