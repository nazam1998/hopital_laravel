<?php

namespace Database\Seeders;

use App\Models\Consultation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ConsultationSeeder extends Seeder
{
    // Variable globale qui servira à mettre l'état d'une consulation sur fait 3 fois sur 4
    protected $count;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Consultation::factory()
            ->count(2000)
            ->create();

        $consultations = Consultation::all();
        $i = 0;
        foreach ($consultations as $consultation) {
            $consultationDateTime = Carbon::parse($consultation->date, $consultation->time)->format('Y-m-d H:i:s');
            if ($consultationDateTime <= Carbon::now()) {

                $i++; // Si la date est passée, on incrément le compteur
                if ($i % 4 <= 2) {  // Si on est à moins de 3 fois sur 4, on met l'état de la consulation sur fait
                    $consultation->statut_consultations_id = 4;
                    $consultation->save();
                }
            }
        }
    }
}
