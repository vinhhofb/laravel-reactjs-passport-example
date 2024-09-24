<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('positions')->truncate();
        DB::table('positions')->insert([
            ['position_name' => 'Employee'],
            ['position_name' => 'Manager'],
            ['position_name' => 'Director'],
            ['position_name' => 'Engineer'],
            ['position_name' => 'Consultant'],
        ]);
    }
}
