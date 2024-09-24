<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreEmployeeRequest;
use App\Models\EmployeeDetail;
use App\Models\EmployeeInformation;
use App\Models\EmployeeLeaveBalance;
use App\Models\EmployeeSalary;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUser(Request $request)
    {
        $attendances = DB::table('attendances')->where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();
        $currentDate = Carbon::now()->toDateString();
        // Check if the user has already checked in today
        $attendanceToday = DB::table('attendances')
            ->where('user_id', $request->user()->id)
            ->whereDate('checkin_time', $currentDate)
            ->exists();
        return [
            'user' => $request->user(),
            'attendances' => $attendances,
            'attendanceToday' => $attendanceToday
        ];
    }

    public function createEmployee(StoreEmployeeRequest $request)
    {
        $user = User::create([
            'name' => $request->employee_infomations['full_name'],
            'email' => $request->employee_infomations['email'],
            'password' => Hash::make('123456')
        ]);
        if($request->employee_infomations){
            EmployeeInformation::create(array_merge($request->employee_infomations, ['user_id' => $user->id]));
        }
        if($request->employee_details){
            EmployeeDetail::create(array_merge($request->employee_details, ['user_id' => $user->id]));
        }
        if($request->employee_salarys){
            EmployeeSalary::create(array_merge($request->employee_salarys, ['user_id' => $user->id]));
        }
        if($request->employee_leave_balances){
            EmployeeLeaveBalance::create(array_merge($request->employee_leave_balances, ['user_id' => $user->id]));
        }

        return response()->json(['message' => 'Employee records created successfully.'], 201);
    }
}
