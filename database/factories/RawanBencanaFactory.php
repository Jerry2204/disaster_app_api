<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RawanBencanaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_wilayah' => $this->faker->sentence(),
            'koordinat_lattitude' => '12.878',
            'koordinat_longitude' => '90.871',
            'jenis_rawan_bencana' => 'Banjir',
            'level_rawan_bencana' =>  $this->faker->randomElement(['level 1', 'level 2', 'level 3', 'level 4']),
            'user_id' => User::all()->random()->id
        ];
    }
}
