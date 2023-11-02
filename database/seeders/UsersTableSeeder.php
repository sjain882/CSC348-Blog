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
        $roleSize = (Role::get()->count())-1;
        $role = Role::find($roleSize - ($roleSize - 1));

        // Create admin user
        $a = new User;
        $a->name = "Admin";
        $a->email = fake()->unique()->safeEmail();
        $a->password = bcrypt('changeme');
        $a->picture = null;
        $a->save();
        $a->roles()->save($role);
        $a->save();

        User::factory()->count(3)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
