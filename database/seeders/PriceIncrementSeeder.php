<?php

namespace Database\Seeders;

use App\Models\PriceIncrement;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PriceIncrementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PriceIncrement::factory()->create();
    }
}
