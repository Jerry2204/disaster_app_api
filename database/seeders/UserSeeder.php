<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Admin BPBD',
                'email' => 'adminbpbd@gmail.com',
                'tanggal_lahir' => '1999-04-18',
                'nomor_telepon'=>'082274221345',
                'username' => 'adminbpbd',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'name' => 'PraBencana',
                'email' => 'prabencana@gmail.com',
                'tanggal_lahir' => '1999-04-18',
                'nomor_telepon'=>'082274221342',
                'username' => 'prabencana2204',
                'password' => Hash::make('prabencana123'),
                'role' => 'pra_bencana',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'name' => 'TanggapDarurat',
                'email' => 'tanggapdarurat@gmail.com',
                'tanggal_lahir' => '1999-04-18',
                'nomor_telepon'=>'082274221312',
                'username' => 'tanggapdarurat2204',
                'password' => Hash::make('tanggapdarurat123'),
                'role' => 'tanggap_darurat',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'name' => 'PascaBencana',
                'email' => 'pascabencana@gmail.com',
                'tanggal_lahir' => '1999-04-18',
                'nomor_telepon'=>'082274221311',
                'username' => 'pascabencana2204',
                'password' => Hash::make('pascabencana123'),
                'role' => 'pasca_bencana',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'name' => 'Sonia Pasaribu',
                'email' => 'sonia@gmail.com',
                'tanggal_lahir' => '1999-04-18',
                'nomor_telepon'=>'082274221321',
                'username' => 'sonia2204',
                'password' => Hash::make('sonia123'),
                'role' => 'user',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
        ]);
    }
}
