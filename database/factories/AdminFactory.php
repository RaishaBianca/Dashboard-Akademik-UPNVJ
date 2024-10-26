<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $adminIds = [1,2,3];
        return [
            'id_admin' => $this->faker->regexify('[A-Za-z0-9]{30}'),
            'nama' => $this->faker->name,
            'no_tlp' => $this->faker->regexify('[0-9]{20}'),
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
            'id_peran' => $this->faker->randomElement($adminIds),
            'remember_token' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'dibuat_pada' => $this->faker->dateTime(),
            'dimodif_pada' => $this->faker->dateTime(),
        ];

    }

    /**
     * Indicate that the user is an admin.
     *
     * @return \Database\Factories\AdminFactory
     */
}
