<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('office_locations')->insert([
            'name' => 'St Georges Terrace',
            'price' => 1900,
            'offices' => 4,
            'tables' => 8,
            'sqmt' => 300,
        ]);

        DB::table('office_locations')->insert([
            'name' => 'Murray Street',
            'price' => 1700,
            'offices' => 3,
            'tables' => 6,
            'sqmt' => 320,
        ]);

        DB::table('office_locations')->insert([
            'name' => 'Barrack Street',
            'price' => 1750,
            'offices' => 3,
            'tables' => 6,
            'sqmt' => 280,
        ]);

        DB::table('office_locations')->insert([
            'name' => 'Hay Street',
            'price' => 1500,
            'offices' => 4,
            'tables' => 8,
            'sqmt' => 300,
        ]);


        DB::table('office_locations')->insert([
            'name' => 'William Street',
            'price' => 1300,
            'offices' => 2,
            'tables' => 4,
            'sqmt' => 180,
        ]);

        DB::table('office_locations')->insert([
            'name' => 'Wellington Street',
            'price' => 1200,
            'offices' => 2,
            'tables' => 3,
            'sqmt' => 160,
        ]);

        DB::table('office_locations')->insert([
            'name' => 'Adelaide Terrace',
            'price' => 980,
            'offices' => 2,
            'tables' => 3,
            'sqmt' => 180,
        ]);

        DB::table('office_locations')->insert([
            'name' => 'Kings Park Road',
            'price' => 850,
            'offices' => 1,
            'tables' => 2,
            'sqmt' => 120,
        ]);

        DB::table('office_locations')->insert([
            'name' => 'Roe Street',
            'price' => 690,
            'offices' => 1,
            'tables' => 1,
            'sqmt' => 70,
        ]);
    }
}
