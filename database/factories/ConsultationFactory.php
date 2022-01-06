<?php

namespace Database\Factories;

use App\Models\Consultation;
use App\Models\Docteur;
use App\Models\Local;
use App\Models\Patient;
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
        // Permet de générer une variable qui va nous permettre de récupérer la date de début
        $startDate = Carbon::createFromFormat('Y/m/d', '2021/06/01');

        // Permet de générer une variable qui va nous permettre de récupérer la date limite
        $endDate = Carbon::createFromFormat('Y/m/d', '2022/01/31');

        // Permet de générer une variable qui va nous permettre de récupérer l'heure d'ouverture
        $startTime = Carbon::createFromFormat('H:i:s', '8:00:00');

        // Permet de générer une variable qui va nous permettre de récupérer l'heure de fin
        $endTime = Carbon::createFromFormat('H:i:s', '19:00:00');



        // Permet de récupérer une date et une heure aléatoire entre les deux dates et les 2 heures
        $randomDate = $this->faker->dateTimeBetween($startDate, $endDate);
        $randomTime = $this->faker->dateTimeBetween($startTime, $endTime);

        // Permet de récupérer un patient qui n'a pas de consultation à la date random
        $patient = Patient::inRandomOrder()->whereDoesntHave('consultations', function ($query) use ($randomDate) {
            return $query->where('date', $randomDate);
        })->first();
        // Permet de récupérer un docteur qui n'a pas de consultation au même moment que la date et l'heure random
        $docteur = Docteur::inRandomOrder()->whereDoesntHave('consultations', function ($query) use ($randomDate, $randomTime) {
            return $query->where('date', $randomDate)->where('heure', $randomTime);
        })->first();


        $randomDateTime = Carbon::parse($randomDate, $randomTime)->format('Y-m-d H:i:s');
        // Permet de vérifier si la date de la consultation aléatoire est passée ou non
        // Et si elle est passée, on ne mettra pas le statut planifié :)
        if ($randomDateTime > Carbon::now()) {
            $statut_array = [1, 2];
        } else {
            $statut_array = [2, 3, 4];
        }

        // Permet de récupérer un statut de consultation aléatoire

        $statut_index = array_rand($statut_array);


        $statut = $statut_array[$statut_index];

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
