<?php

namespace Database\Seeders;

use App\Models\EmployeeSalary;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employee_salarys')->truncate();
        $salaries = [
            ['user_id' => 1, 'basic_salary' => 60000, 'unit' => 'USD', 'allowance' => 5000, 'bonus' => 2000, 'penalty' => 0],
            ['user_id' => 2, 'basic_salary' => 75000, 'unit' => 'USD', 'allowance' => 6000, 'bonus' => 3000, 'penalty' => 0],
            ['user_id' => 3, 'basic_salary' => 55000, 'unit' => 'USD', 'allowance' => 4500, 'bonus' => 1500, 'penalty' => 0],
            ['user_id' => 4, 'basic_salary' => 65000, 'unit' => 'USD', 'allowance' => 5500, 'bonus' => 2500, 'penalty' => 0],
            ['user_id' => 5, 'basic_salary' => 70000, 'unit' => 'USD', 'allowance' => 5000, 'bonus' => 2000, 'penalty' => 0],
            ['user_id' => 6, 'basic_salary' => 60000, 'unit' => 'USD', 'allowance' => 5000, 'bonus' => 2000, 'penalty' => 0],
        ];

        foreach ($salaries as $salary) {
            EmployeeSalary::create($salary);
        }
    }
}
