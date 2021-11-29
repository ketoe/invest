<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class currencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currency')->insert([
            'shortName' => 'PLN',
            'longName' => 'Złoty',
            'value' => 1.0
        ]);

        DB::table('currency')->insert([
            'shortName' => 'EUR',
            'longName' => 'Euro',
            'value' => 4.60
        ]);

        DB::table('currency')->insert([
            'shortName' => 'USD',
            'longName' => 'Dolar',
            'value' => 4.19
        ]);
    }
}
