<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                "nom"=>"PYTHON",
            ],
            [
                "nom"=>"JAVA",
            ],
            [
                "nom"=>"JAVASCRIPT",
            ],
            [
                "nom"=>"PHP",
            ],
            [
                "nom"=>"C++",
            ],
            [
                "nom"=>"C#",
            ],
            [
                "nom"=>"MYSQL",
            ],
        ]);
    }
}
