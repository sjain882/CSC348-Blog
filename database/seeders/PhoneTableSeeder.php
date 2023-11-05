<?php

namespace Database\Seeders;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Add the first phone number to the database
        $firstNumber = new Phone;
        $firstNumber->phone_num = "+44 1632 960413";
        $firstNumber->user_id = 1;        // Default admin user
        $firstNumber->save();

        // Add a random fake phone number to a random user
        $secondNumber = new Phone;
        $secondNumber->phone_num = fake()->unique()->e164PhoneNumber();
        $secondNumber->user_id = fake()->numberBetween(1, (User::get()->count())); // Random user
        $secondNumber->save();

        

    }
}
