<?php

namespace Database\Seeders;

use App\Models\Veternarian;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VeternarianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Veternarian::factory()->create();
    }
}
