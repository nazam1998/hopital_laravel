<?php

namespace Database\Factories;

use App\Models\Docteur;
use App\Models\Local;
use App\Models\Patient;
use App\Models\StatutConsultation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // $startDate = Carbon::createFromFormat('Y/m/d', '2021/06/01');
        // $endDate = Carbon::createFromFormat('Y/m/d', '2022/01/31');
        // $randomDate = $faker->dateTimeBetween($startDate, $endDate);
        // Carbon::parse($randomDate)->format('Y-m-d H:i:s')



        $startDate = Carbon::createFromFormat('Y/m/d', '2021/06/01');
        $endDate = Carbon::createFromFormat('Y/m/d', '2022/01/31');
        $startTime = Carbon::createFromFormat('H:i:s', '8:00:00');
        $endTime = Carbon::createFromFormat('H:i:s', '19:00:00');


        do {

            $randomDate = $this->faker->dateTimeBetween($startDate, $endDate);
            $randomTime = $this->faker->dateTimeBetween($startTime, $endTime);
            $patient = Patient::inRandomOrder()->first();
            $docteur = Docteur::inRandomOrder()->first();
            $isPatientFree = $patient->consultations()->where('heure', $randomTime)->first();
            $isDocteurFree = $docteur->consultations()->where('heure', $randomTime)->where('date', $randomDate)->first();
        } while ($isPatientFree || $isDocteurFree);
        if ($randomDate > Carbon::now()) {
            $statut = StatutConsultation::inRandomOrder()->first()->id;
        } else {
            $statut = StatutConsultation::inRandomOrder()->first()->id;
        }
        return [
            'date' => Carbon::parse($randomDate)->format('Y-m-d'),
            'heure' => Carbon::parse($randomTime)->format('H:i:s'),
            'patients_id' => $patient->registre,
            'docteurs_id' => $docteur->id,
            'locals_id' => Local::inRandomOrder()->first()->id,
            'statut_consultations_id' => $statut

        ];
    }
}
