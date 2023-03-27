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
                'role' => 'pra_bencana',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
        ]);
    }
}
