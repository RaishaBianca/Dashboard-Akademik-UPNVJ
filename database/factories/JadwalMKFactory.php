<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\JadwalMK;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JadwalMK>
 */
class JadwalMKFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = JadwalMK::class;
    public function definition(): array
    {
        $MKID = ['MK1', 'MK2', 'MK3', 'MK4', 'MK5','MK6','MK7','MK8','MK9','MK10'];
        $RuanganID = ['A1', 'A2','B1','B2','C1'];
        return [
            'id_mk' => $this->faker->randomElement($MKID),
            'id_ruang' => $this->faker->randomElement($RuanganID),
            'id_dosen' => User::factory(),
            'jam_mulai' => $this->faker->time(),
            'jam_selesai' => $this->faker->time(),
            'hari' => $this->faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']),
        ];
    }
}
