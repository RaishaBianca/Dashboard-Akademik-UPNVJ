<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\LaporKendala;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LaporKendalaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = LaporKendala::class;
    public function definition(): array
    {

        $JenisKendalaID = ['JK1', 'JK2', 'JK3', 'JK4'];
        $BentukKendalaID = ['BK1', 'BK2','BK3','BK4','BK5'];
        $RuanganID = ['A1', 'A2','B1','B2','C1'];
        return [
            'id_user' => User::factory(),
            'id_jenis_kendala' => $this->faker->randomElement($JenisKendalaID),
            'id_bentuk_kendala' => $this->faker->randomElement($BentukKendalaID),
            'id_ruang' => $this->faker->randomElement($RuanganID),
            'tgl_lapor' => $this->faker->dateTime(),
            'deskripsi_kendala' => $this->faker->text(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'tgl_penyelesaian' => $this->faker->dateTime(),
            'keterangan_penyelesaian' => $this->faker->text(),
        ];
    }
}
