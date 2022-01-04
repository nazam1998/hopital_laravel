<?php

namespace Database\Seeders;

use App\Models\Docteur;
use Illuminate\Database\Seeder;

class DocteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Docteur::factory()
            ->count(50)
            ->create();
    }
}
