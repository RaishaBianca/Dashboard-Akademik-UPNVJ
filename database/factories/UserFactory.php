<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $peranIds = [3,4,5];
        $prodiValues = ['Informatika','Sistem Informasi', 'Manajemen Informasi'];
        return [
            'id_user' => Str::random(30),
            'nama' => $this->faker->name(),
            'no_tlp' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'id_peran' => $this->faker->randomElement($peranIds),
            'prodi' => $this->faker->randomElement($prodiValues),
            'dibuat_pada' => now(),
            'dimodif_pada' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
