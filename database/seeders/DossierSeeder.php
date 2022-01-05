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
        // Permet de récupérer toutes les consultations qui ont un statut fait
        $consultations = Consultation::where('statut_consultations_id', 4)->get();

        // Boucle sur toutes les consultations faites
        foreach ($consultations as $consultation) {

            // Permet récupérer le patient qui est concerné par la consultation
            $patient = $consultation->patient;

            // Permet de vérifier si le patient n'a pas déjà 5 dossiers médicaux
            if ($patient->dossiers()->count() < 5) {
                $maladie = Maladie::inRandomOrder()->first();

                // vérifie si la maladie est incurable
                if (!$maladie->curable) {
                    // Assigne l'id du statut incurable à la variable
                    $statut = 4;
                } else {
                    // Assigne un id autre que celui du statut incurable à la variable
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
