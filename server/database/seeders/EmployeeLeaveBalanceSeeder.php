<?php

namespace Database\Seeders;

use App\Models\EmployeeLeaveBalance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeLeaveBalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employee_leave_balances')->truncate();
        $leaveBalances = [
            ['user_id' => 2, 'annual_leave_days' => 22, 'used_leave_days' => 3, 'remaining_leave_days' => 19, 'hours_in_day' => 8],
            ['user_id' => 3, 'annual_leave_days' => 18, 'used_leave_days' => 6, 'remaining_leave_days' => 12, 'hours_in_day' => 8],
            ['user_id' => 4, 'annual_leave_days' => 15, 'used_leave_days' => 2, 'remaining_leave_days' => 13, 'hours_in_day' => 8],
            ['user_id' => 5, 'annual_leave_days' => 25, 'used_leave_days' => 0, 'remaining_leave_days' => 25, 'hours_in_day' => 8],
            ['user_id' => 6, 'annual_leave_days' => 20, 'used_leave_days' => 5, 'remaining_leave_days' => 15, 'hours_in_day' => 8],
        ];

        foreach ($leaveBalances as $leaveBalance) {
            EmployeeLeaveBalance::create($leaveBalance);
        }
    }
}
