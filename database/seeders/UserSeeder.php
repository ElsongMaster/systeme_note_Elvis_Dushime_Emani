<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        DB::table('users')->insert([
            [
                "image"=>$faker->imageUrl($width = 640, $height = 480),
                "name"=>"Elson",
                "email"=>"Els@gmail.com",
                "role_id"=>1,
                "password"=>Hash::make("test"),
            ],
            [
                "image"=>$faker->imageUrl($width = 640, $height = 480),
                "name"=>"picolo",
                "email"=>"picolo@gmail.com",
                "role_id"=>2,
                "password"=>Hash::make("test"),
            ]
        ]);
    }
}
