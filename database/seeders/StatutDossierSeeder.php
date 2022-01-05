<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutDossierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statut_dossiers')->insert([
            ['nom' => 'diagnostiqué'],
            ['nom' => 'en cours de traitement'],
            ['nom' => 'guéri'],
            ['nom' => 'incurable'],
        ]);
    }
}
