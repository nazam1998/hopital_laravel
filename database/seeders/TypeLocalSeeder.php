<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeLocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('type_locals')->insert(
            [
                [
                    'nom' => 'bureau',
                ],
                [
                    'nom' => 'bloc',
                ]
            ]
        );
    }
}
