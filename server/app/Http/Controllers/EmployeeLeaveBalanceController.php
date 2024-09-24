<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeLeaveBalance\UpdateEmployeeLeaveBalanceRequest;
use App\Models\EmployeeLeaveBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeLeaveBalanceController extends Controller
{
    public function index()
    {
        $leaveBalances = DB::table('employee_leave_balances')
            ->join('employee_infomations', 'employee_leave_balances.user_id', '=', 'employee_infomations.user_id')
            ->select(
                'employee_leave_balances.user_id',
                'employee_infomations.full_name',
                'employee_infomations.avatar',
                'employee_leave_balances.annual_leave_days',
                'employee_leave_balances.used_leave_days',
                'employee_leave_balances.remaining_leave_days',
                'employee_leave_balances.hours_in_day'
            )
            ->get();

        return response()->json($leaveBalances, 200);
    }

    public function update(UpdateEmployeeLeaveBalanceRequest $request, $id)
    {
        $leaveBalance = EmployeeLeaveBalance::findOrFail($id);
        $leaveBalance->update($request->validated());

        return response()->json([
            'message' => 'Leave balance updated successfully.',
            'data' => $leaveBalance,
        ], 200);
    }
}
