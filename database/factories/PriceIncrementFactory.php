<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Array_;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PriceIncrement>
 */
class PriceIncrementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Serves as a base set of $increments
        $increments = [
            [
                'inc_name' => 'hour',
                'inc_short_name' => 'hr'
            ],
            [
                'inc_name' => 'day',
                'inc_short_name' => 'day'
            ],
            [
                'inc_name' => 'week',
                'inc_short_name' => 'week'
            ],
            [
                'inc_name' => 'month',
                'inc_short_name' => 'mth'
            ],
            [
                'inc_name' => 'session',
                'inc_short_name' => 'session'
            ],
        ];

        $inc_count = 0;

        foreach ($increments as $increment) {
            DB::table('price_increments')->insert($increment);
            $inc_count++;
        }

        echo "Seeded {$inc_count} entries in the PriceIncrement table!";

        exit;
    }
}
