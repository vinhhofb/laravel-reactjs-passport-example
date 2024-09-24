<?php

namespace Database\Seeders;

use App\Models\EmployeeDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employee_details')->truncate();
        $details = [
            ['user_id' => 2, 'position' => 'Project Manager', 'department' => 'IT', 'start_date' => '2020-05-15', 'contract_type' => 1, 'contract_end_date' => null, 'years_of_experience' => 8],
            ['user_id' => 3, 'position' => 'UI/UX Designer', 'department' => 'Design', 'start_date' => '2019-04-20', 'contract_type' => 1, 'contract_end_date' => null, 'years_of_experience' => 6],
            ['user_id' => 4, 'position' => 'QA Engineer', 'department' => 'QA', 'start_date' => '2021-08-01', 'contract_type' => 2, 'contract_end_date' => null, 'years_of_experience' => 4],
            ['user_id' => 5, 'position' => 'DevOps Engineer', 'department' => 'IT', 'start_date' => '2022-01-10', 'contract_type' => 3, 'contract_end_date' => null, 'years_of_experience' => 3],
            ['user_id' => 6, 'position' => 'Software Developer', 'department' => 'IT', 'start_date' => '2021-06-01', 'contract_type' => 2, 'contract_end_date' => null, 'years_of_experience' => 5],
        ];

        foreach ($details as $detail) {
            EmployeeDetail::create($detail);
        }
    }
}
