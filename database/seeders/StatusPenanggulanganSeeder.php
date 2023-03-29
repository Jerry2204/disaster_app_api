<?php

namespace Database\Seeders;

use App\Models\StatusPenanggulangan;
use App\Models\User;
use Illuminate\Database\Seeder;

class StatusPenanggulanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusPenanggulangan::insert([
            [
                'petugas' => 'John',
                'keterangan' => 'Sudah ditangani',
                'tindakan' => 'pembersihan parit, penampungan air',
                'status' => 'selesai',
                'user_id' => User::all()->random()->id
            ]
        ]);
    }
}
