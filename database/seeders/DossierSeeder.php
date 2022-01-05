<?php

namespace Database\Seeders;

use App\Models\Consultation;
use App\Models\Maladie;
use App\Models\StatutDossier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DossierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consultations = Consultation::where('statut_consultations_id', 4)->get();

        foreach ($consultations as $consultation) {


            $patient = $consultation->patient;

            // Permet de vérifier si le patient n'a pas déjà 5 dossiers médicaux
            if ($patient->dossiers()->count() < 5) {
                $maladie = Maladie::inRandomOrder()->first();

                if (!$maladie->curable) {
                    $statut = 4;
                } else {
                    $statut = StatutDossier::inRandomOrder()->where('id', '!=', 4)->first()->id;
                }
                DB::table('dossiers')->insert([
                    'patients_id' => $patient->registre,
                    'consultations_id' => $consultation->id,
                    'maladies_id' => $maladie->id,
                    'statut_dossiers_id' => $statut
                ]);
            }
        }
    }
}
