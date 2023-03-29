<?php

namespace Database\Seeders;

use App\Models\Korban;
use App\Models\User;
use Illuminate\Database\Seeder;

class KorbanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Korban::insert([
            [
                'meninggal' => 100,
                'luka_berat' => 200,
                'luka_ringan' => 50,
                'hilang' => 1,
                'user_id' => User::all()->random()->id
            ]
        ]);
    }
}
