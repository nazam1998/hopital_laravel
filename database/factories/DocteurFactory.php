<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocteurFactory extends Factory
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
            'experience' => rand(1, 15),
            'specialisation' => $this->faker->jobTitle()
        ];
    }
}
