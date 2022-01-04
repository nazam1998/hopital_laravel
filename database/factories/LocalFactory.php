<?php

namespace Database\Factories;

use App\Models\Hopital;
use App\Models\TypeLocal;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        do {
            $hopital = Hopital::inRandomOrder()->first();
        } while ($hopital->locals()->count() > 80);

        return [
            'nom' => 'local' . rand(0, 300),
            'hopitals_id' => $hopital->id,
            'type_locals_id' => TypeLocal::inRandomOrder()->first()
        ];
    }
}
