<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Ruangan;
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
        $Ruanganids = ['A1', 'A2', 'B1', 'B2', 'C1'];
        return [
            'id_user'=> User::factory(),
            'id_ruang'=> $this->faker->randomElement($Ruanganids),
            'tgl_pinjam'=> $this->faker->date(),
            'jam_mulai'=> $this->faker->time(),
            'jam_selesai'=> $this->faker->time(),
            'keterangan'=> $this->faker->text(),
            'status'=> $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'jumlah_orang'=> $this->faker->numberBetween(1, 100),
        ];
    }
}
