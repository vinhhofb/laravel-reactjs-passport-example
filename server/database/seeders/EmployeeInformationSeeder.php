<?php

namespace Database\Seeders;

use App\Models\EmployeeInformation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employee_infomations')->truncate();
        $employees = [
            ['user_id' => 2, 'full_name' => 'Jane Smith', 'gender' => '1', 'date_of_birth' => '1985-02-02', 'nationality' => '1', 'identity_number' => '987654321', 'address' => '456 Elm St', 'phone_number' => '2345678901', 'email' => 'jane@example.com', 'avatar' => 'avatar2.png'],
            ['user_id' => 3, 'full_name' => 'Alice Johnson', 'gender' => '1', 'date_of_birth' => '1992-03-03', 'nationality' => '2', 'identity_number' => '456789123', 'address' => '789 Oak St', 'phone_number' => '3456789012', 'email' => 'alice@example.com', 'avatar' => 'avatar3.png'],
            ['user_id' => 4, 'full_name' => 'Bob Brown', 'gender' => '2', 'date_of_birth' => '1980-04-04', 'nationality' => '1', 'identity_number' => '321654987', 'address' => '321 Pine St', 'phone_number' => '4567890123', 'email' => 'bob@example.com', 'avatar' => 'avatar4.png'],
            ['user_id' => 5, 'full_name' => 'Charlie Davis', 'gender' => '1', 'date_of_birth' => '1988-05-05', 'nationality' => '1', 'identity_number' => '654321789', 'address' => '654 Maple St', 'phone_number' => '5678901234', 'email' => 'charlie@example.com', 'avatar' => 'avatar5.png'],
            ['user_id' => 6, 'full_name' => 'John Doe', 'gender' => '2', 'date_of_birth' => '1990-01-01', 'nationality' => '1', 'identity_number' => '123456789', 'address' => '123 Main St', 'phone_number' => '1234567890', 'email' => 'john@example.com', 'avatar' => 'avatar1.png'],
        ];

        foreach ($employees as $employee) {
            EmployeeInformation::create($employee);
        }
    }
}
