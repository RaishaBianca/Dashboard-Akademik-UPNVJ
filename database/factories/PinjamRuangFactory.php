<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PinjamRuangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_pinjam'=> $this->faker->regexify('[A-Za-z0-9]{30}'),
            'id_user'=> $this->faker->regexify('[A-Za-z0-9]{30}'),
        ];
    }
}
