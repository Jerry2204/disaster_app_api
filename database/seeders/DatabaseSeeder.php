<?php

namespace Database\Seeders;

use App\Models\LaporanBencana;
use App\Models\RawanBencana;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PeringatanDiniSeeder::class,
            ArtikelSeeder::class,
            RawanBencanaSeeder::class,
            KecamatanSeeder::class
            // StatusPenanggulanganSeeder::class,
            // KorbanSeeder::class
        ]);

        // RawanBencana::factory(30)->create();
        // LaporanBencana::factory(30)->create();
    }
}
