<?php

namespace Database\Seeders;

use App\Models\PeringatanDini;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class PeringatanDiniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PeringatanDini::insert([
            [
                'tanggal' => Date::now(),
                'lokasi' => 'Laguboti',
                'deskripsi' => 'Angin kencang diprediksi akan melanda laguboti, dan diharapkan masyarakat tetap berada di rumah'
            ],
            [
                'tanggal' => Date::now(),
                'lokasi' => 'Sitoluama',
                'deskripsi' => 'Angin kencang diprediksi akan melanda Sitoluama, dan diharapkan masyarakat tetap berada di rumah'
            ],
        ]);
    }
}
