<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Address;
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'prenom' => $this->faker->name(),
            'date_naissance' => $this->faker->dateTimeBetween('1990-01-01', '2012-12-31'),
            'registre' => $this->faker->rrn(),
            'adresse' => $this->faker->streetAddress(),
            'pays' => $this->faker->country(),
            'ville' => $this->faker->city(),
            'code_postal' => Address::postcode(),
            'gsm' => $this->faker->e164PhoneNumber(),
            'contact' => $this->faker->name(),
            'contact_gsm' => $this->faker->e164PhoneNumber(),
        ];
    }
}
