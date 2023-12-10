<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,100) as $index) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('123456'),
                'address' => $faker->address,
                'role_id' => $faker->randomElement([1, 2, 3])
            ]);
        }
    }
}
