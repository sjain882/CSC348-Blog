<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $roleId = fake()->numberBetween(2,((Role::get()->count())));
        $roleName = "";
        
        switch ($roleId)
        {
            case 0:
                break;
            case 1:
                $roleName = Role::find(1)->name;
                break;
            case 2:
                $roleName = Role::find(2)->name;
                break;
            case 3:
                $roleName = Role::find(3)->name;
                break;
            case 4:
                $roleName = Role::find(4)->name;
                break;
        }

        return [
            'id' => $roleId,
            'name' => $roleName
        ];
    }
}
