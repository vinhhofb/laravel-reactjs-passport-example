<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ContractTypeSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(EmployeeDetailSeeder::class);
        $this->call(EmployeeInformationSeeder::class);
        $this->call(EmployeeLeaveBalanceSeeder::class);
        $this->call(EmployeeSalarySeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LeaveRequestsSeeder::class);
    }
}
