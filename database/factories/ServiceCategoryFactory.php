<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceCategory>
 */
class ServiceCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $count = 0;
        $categories = [
            [
                'name' => 'Training',
                'description' => 'All training related services',
                'backgroundColor' => '#255C69',
                'borderColor' => '#012D35',
                'textColor' => '#6D949D'
            ],
            [
                'name' => 'Daycare',
                'description' => 'All daycare related services',
                'backgroundColor' => '#AA9A39',
                'borderColor' => '#564A00',
                'textColor' => '#FEF3AE'
            ],
            [
                'name' => 'Grooming',
                'description' => 'All grooming related services',
                'backgroundColor' => '#E82626',
                'borderColor' => '#564A00',
                'textColor' => '#8725E8'
            ],
        ];

        foreach ($categories as $category) {
            DB::table('service_categories')->insert([$category]);
            $count++;
        };

        echo "{$count} Service Categories seeded!";

        exit;
    }
}
