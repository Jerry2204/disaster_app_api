<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LaporanBencanaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jenis_bencana' => $this->faker->randomElement(['bencana alam', 'bencana non alam', 'bencana sosial']),
            'nama_bencana' => $this->faker->sentence(),
            'lokasi' => $this->faker->address(),
            'keterangan' => $this->faker->sentence(),
            'gambar' => '1679987265_psikotest.png',
            'status_bencana' =>  $this->faker->randomElement(['rendah', 'sedang', 'darurat']),
            'korban_id' => 1,
            'status_penanggulangan_id' => 1,
            'user_id' => User::all()->random()->id
        ];
    }
}
