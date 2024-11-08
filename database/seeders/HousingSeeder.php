<?php

namespace Database\Seeders;

use App\Models\Housing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HousingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Housing::factory()->count(20)->create();
    }
}
