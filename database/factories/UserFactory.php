<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->randomNumber(9),
            'phone_code' => $this->faker->randomElement([
                '+1',
                '+7',
                '+20',
                '+27',
                '+30',
                '+31',
                '+32',
                '+33',
                '+34',
                '+36',
                '+39',
                '+40',
                '+41',
                '+43',
                '+44',
                '+45',
                '+46',
                '+47',
                '+48',
                '+49',
                '+51',
                '+52',
                '+53',
                '+54',
                '+55',
                '+56',
                '+57',
                '+58',
                '+60',
                '+61',
                '+62',
                '+63',
                '+64',
                '+65',
                '+66',
                '+77',
                '+81',
                '+82',
                '+84',
                '+86',
                '+90',
                '+91',
                '+92',
                '+93',
                '+94',
                '+95',
                '+98',
                '+211',
                '+212',
                '+213'
            ]), // add more as needed
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // set a default password for seeding
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null
        ];
    }

    public function withRole(string $roleName): static
    {
        return $this->afterCreating(function (User $user) use ($roleName) {
            $role = Role::firstOrCreate(['name' => $roleName]); // Ensures the role exists
            $user->assignRole($role);
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
