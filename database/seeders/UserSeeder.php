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
                'name' => 'Ricky Alfrido Pangaribuan',
                'email' => 'alfridoricky@gmail.com',
                'password' => Hash::make('ricky123'),
                'role' => 'pra_bencana',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'name' => 'Farida Pangaribuan',
                'email' => 'faridapangaribuan@gmail.com',
                'password' => Hash::make('farida123'),
                'role' => 'tanggap_darurat',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'name' => 'Irin Pangaribuan',
                'email' => 'irinpangaribuan@gmail.com',
                'password' => Hash::make('irin123'),
                'role' => 'pasca_bencana',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
        ]);
    }
}
