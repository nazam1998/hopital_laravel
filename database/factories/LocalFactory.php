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

        $hopitals = Hopital::inRandomOrder()->withCount('locals')->get();
        $hopital_id = $hopitals->where('locals_count', '<', 80)->first()->id;

        return [
            'nom' => 'local' . rand(0, 300),
            'hopitals_id' => $hopital_id,
            'type_locals_id' => TypeLocal::inRandomOrder()->first()
        ];
    }
}
