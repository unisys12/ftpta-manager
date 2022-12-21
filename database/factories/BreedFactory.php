<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Breed>
 */
class BreedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $response = Http::withHeaders(
            [
                'x-api-key' => env('DOG_API_KEY')
            ]
        )->get('https://api.thedogapi.com/v1/breeds');

        if ($response->ok()) {
            $body = $response->collect();

            $breed_count = 0;

            foreach ($body as $value) {
                // print_r($value);
                DB::table('breeds')->insert([
                    'name' => $value['name'],
                    'bred_for' => $value['bred_for'] ?? "",
                    'breed_group' => $value['breed_group'] ?? "",
                    'height' => $value['height']['imperial'] ?? "",
                    'image_url' => $value['image']['url'] ?? "",
                    'life_span' => $value['life_span'] ?? "",
                    'origin' => $value['origin'] ?? "",
                    'temperament' => $value['temperament'] ?? "",
                    'weight' => $value['weight']['imperial'] ?? ""
                ]);

                $breed_count++;
            }

            echo "Seeded {$breed_count} breeds to the DB!";

            exit;
        }
    }
}
