<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artikel::insert([
            [
                'judul' => 'Perubahan UU Penanggulangan Bencana',
                'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic placeat perferendis quidem, officia nam et veritatis ullam vitae! Eos tempora accusamus molestiae? Illo facilis obcaecati eligendi, dicta dolore voluptatum voluptate?',
                'gambar' => 'tukul.png',
                'user_id' => User::all()->random()->id
            ],
            [
                'judul' => 'Pelaksanaan sosialisasi dengan masyarakat',
                'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic placeat perferendis quidem, officia nam et veritatis ullam vitae! Eos tempora accusamus molestiae? Illo facilis obcaecati eligendi, dicta dolore voluptatum voluptate?',
                'gambar' => 'postman.png',
                'user_id' => User::all()->random()->id
            ],
        ]);
    }
}
