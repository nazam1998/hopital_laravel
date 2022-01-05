<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            HopitalSeeder::class,
            TypeLocalSeeder::class,
            LocalSeeder::class,
            DocteurSeeder::class,
            StatutConsultationSeeder::class,
            StatutDossierSeeder::class,
            PatientSeeder::class,
            MaladieSeeder::class,
            ConsultationSeeder::class,
            DossierSeeder::class,
        ]);
    }
}
