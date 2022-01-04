<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HopitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hopitals')->insert(
            [
                [
                    'nom' => 'Saint-Anne',
                    'adresse' => 'Rue des Patates 20',
                ],
                [
                    'nom' => 'Bracops',
                    'adresse' => 'Rue des fous 25',
                ],
                [
                    'nom' => 'Crepe',
                    'adresse' => 'Rue des crepes 50',
                ],
            ]
        );
    }
}
