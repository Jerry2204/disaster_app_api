<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\kecamatan;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecamatans = [
            'Ajibata',
            'Balige',
            'Bonatua Lunasi',
            'Borbor',
            'Habinsaran',
            'Laguboti',
            'Lumban Julu',
            'Nassau',
            'Parmaksian',
            'Pintu Pohan Meranti',
            'Porsea',
            'Siantar Narumonda',
            'Sigumpar',
            'Silaen',
            'Tampahan',
            'Uluan'
        ];

        foreach ($kecamatans as $kecamatan) {
            kecamatan::create([
                'nama_kecamatan' => $kecamatan
            ]);
        }
    }
}
