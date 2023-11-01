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
        $a = new Role;
        $a->name = "Admin";
        $a->timestamps = false;             // Disable Laravel's default timestamp DB columns
        $a->save();

        // Create moderator role
        $b = new Role;
        $b->name = "Moderator";
        $b->timestamps = false;
        $b->save();

        // Create user role
        $c = new Role;
        $c->name = "User";
        $c->timestamps = false;
        $c->save();

        // Create muted role
        $d = new Role;
        $d->name = "Muted";
        $d->timestamps = false;
        $d->save();
        
    }
}
