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
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $peranIds = [1,2,3];
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
     * Indicate that the user is an admin.
     *
     * @return \Database\Factories\UserFactory
     */
}
