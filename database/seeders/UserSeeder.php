<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //
        DB::table('users')->insert([
            [
                'name' => 'huynh',
                'email' => 'dokhachuynh@gmail.com',
                'password' => Hash::make('Ngunguoi123'),
            ],
            [
                'name' => 'trang',
                'email' => 'trang0512@gmail.com',
                'password' => Hash::make('Ngunguoi123'),
            ],
        ]);
    }
}
