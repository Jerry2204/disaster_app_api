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
                'name' => 'Jerry Andrianto Pangaribuan',
                'email' => 'jerryandrianto22@gmail.com',
                'password' => Hash::make('jerry123'),
                'role' => 'admin',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'name' => 'User Pra Bencana',
                'email' => 'prabencana@gmail.com',
                'password' => Hash::make('prabencana123'),
                'role' => 'pra_bencana',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'name' => 'User Tanggap Darurat',
                'email' => 'tanggapdarurat@gmail.com',
                'password' => Hash::make('tanggapdarurat123'),
                'role' => 'tanggap_darurat',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'name' => 'User Pasca Bencana',
                'email' => 'pascabencana@gmail.com',
                'password' => Hash::make('pascabencana123'),
                'role' => 'pasca_bencana',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'name' => 'Sonia Pasaribu',
                'email' => 'sonia@gmail.com',
                'password' => Hash::make('sonia123'),
                'role' => 'user',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
        ]);
    }
}
