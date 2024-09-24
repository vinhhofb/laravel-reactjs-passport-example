<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contract_types')->truncate();

        DB::table('contract_types')->insert([
            ['contract_name' => 'Full-time', 'description' => 'Full-time employment contract'],
            ['contract_name' => 'Part-time', 'description' => 'Part-time employment contract'],
            ['contract_name' => 'Temporary', 'description' => 'Temporary employment contract'],
            ['contract_name' => 'Internship', 'description' => 'Internship contract'],
            ['contract_name' => 'Freelance', 'description' => 'Freelance work contract'],
        ]);
    }
}
