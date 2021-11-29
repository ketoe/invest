<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => 'W przygotowaniu',
            'color' => '#FFFF99'
        ]);

        DB::table('statuses')->insert([
            'name' => 'Gotowa do podpisu',
            'color' => '#FF99CC'
        ]);

        DB::table('statuses')->insert([
            'name' => 'Podpisana',
            'color' => '#CC3399'
        ]);

        DB::table('statuses')->insert([
            'name' => 'Przygotowanie do produkcji',
            'color' => '#9999FF'
        ]);

        DB::table('statuses')->insert([
            'name' => 'Produkcja',
            'color' => '#FFFF00'
        ]);

        DB::table('statuses')->insert([
            'name' => 'Gotowe do montażu/dostawy',
            'color' => '#FF3333'
        ]);

        DB::table('statuses')->insert([
            'name' => 'Montaż/dostawa',
            'color' => '#009966'
        ]);

        DB::table('statuses')->insert([
            'name' => 'Zakończone',
            'color' => '#33FF66'
        ]);
    }
}
