<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
            for($i=0; $i<5; $i++):
                DB::table('users')->insert([

                    'name'          => $faker->name(),
                    'username'      => $faker->username(),
                    'email'         => $faker->safeEmail(),
                    'password'      => bcrypt("12345678"),
                    'user_photo'    => $faker->imageUrl(100, 100)

                ]);
            endfor;
    }
}
