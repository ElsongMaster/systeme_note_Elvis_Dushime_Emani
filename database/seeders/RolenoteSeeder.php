<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolenoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Rolenotes')->insert([
            [
                "nom"=>"Editeur",
            ],
            [
                "nom"=>"Auteur",
                
            ]
        ]);
    }
}
