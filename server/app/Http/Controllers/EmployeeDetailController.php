<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmployeeDetailRequest;
use App\Models\EmployeeDetail;
use App\Models\EmployeeInformation;

class EmployeeDetailController extends Controller
{
    public function index()
    {
        $employees = EmployeeInformation::join('employee_details', 'employee_infomations.user_id', '=', 'employee_details.user_id')
            ->select(
                'employee_infomations.user_id',
                'employee_infomations.full_name',
                'employee_infomations.avatar',
                'employee_details.position',
                'employee_details.department',
                'employee_details.start_date',
                'employee_details.contract_type',
                'employee_details.contract_end_date',
                'employee_details.years_of_experience'
            )
            ->get();

        return response()->json($employees);
    }

    public function update(UpdateEmployeeDetailRequest $request, $id)
    {
        $employeeDetail = EmployeeDetail::where('id', $id)->first();

        if (!$employeeDetail) {
            return response()->json(['message' => 'Employee detail not found'], 404);
        }

        $employeeDetail->update($request->validated());

        return response()->json(['message' => 'Employee detail updated successfully', 'data' => $employeeDetail]);
    }
}
