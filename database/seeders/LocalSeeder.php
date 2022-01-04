<?php

namespace Database\Seeders;

use App\Models\Local;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Local::factory()
            ->count(150)
            ->create();
    }
}
