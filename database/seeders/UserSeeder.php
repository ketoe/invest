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
        DB::table('users')->insert([
            'name' => 'Marcin',
            'surname' => 'Stefanowski',
            'admin' => 1,
            'email' => 'marcin.stefanowski@pellplast.pl',
            'password' => Hash::make('stefan94'),
        ]);
    }
}
