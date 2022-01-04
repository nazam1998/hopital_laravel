<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statut_consultations')->insert(
            [
                [
                    'statut' => 'planifié',
                ],
                [
                    'statut' => 'annulé',
                ],
                [
                    'statut' => 'raté',
                ],
                [
                    'statut' => 'fait',
                ],
            ]
        );
    }
}
