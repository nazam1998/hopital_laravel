<?php

namespace Database\Seeders;

use App\Models\Consultation;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Consultation::factory()
            ->count(2000)
            ->state(new Sequence(
                ['admin' => 'Y'],
                ['admin' => 'N'],
            ))
            ->create();
    }
}
