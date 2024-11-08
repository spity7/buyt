<?php

namespace Database\Factories;

use App\Models\Housing;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Housing>
 */
class HousingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'type' => $this->faker->randomElement(['بيت', 'شقة', 'شاليه', 'مركز']),
            'type_description' => $this->faker->sentence,
            'nb_rooms' => $this->faker->numberBetween(1, 10),
            'area' => $this->faker->word,
            'governorate' => $this->faker->randomElement(Housing::GOVERNORATES),
            'city' => $this->faker->city,
            'service_type' => $this->faker->randomElement(['مجاني', 'مدفوع']),
            'furnishing_status' => $this->faker->randomElement(['مفروش', 'غير مفروش']),
            'price' => $this->faker->randomFloat(2, 100, 1000), // Example: random price between 100 and 10000
            'description' => $this->faker->paragraph,
            'user_id' => 2,
        ];
    }
}
