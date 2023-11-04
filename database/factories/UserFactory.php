<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('changeme'), // password
        ];
    }


    public function configure()
    {
        return $this->afterCreating(function (User $user) {

            // Choose a random role
            $randomRole = Role::all()->random(1);

            // Assign a random role (we can have multiple admins, so any role OK)
            $user->roles()->attach($randomRole);

            // Depending on which role was assigned, assign all the lower roles too
            switch ($randomRole[0]->id)
            {
                case 0:
                    break;
                case 1:
                    $user->roles()->attach(Role::find(2));
                    $user->roles()->attach(Role::find(3));
                    $user->roles()->attach(Role::find(4));
                    break;
                case 2:
                    $user->roles()->attach(Role::find(3));
                    $user->roles()->attach(Role::find(4));
                    break;
                case 3:
                    $user->roles()->attach(Role::find(4));
                    break;
                case 4:
                    break;
            }

        });
    }



    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
