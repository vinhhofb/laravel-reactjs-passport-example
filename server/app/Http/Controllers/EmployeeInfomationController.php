<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreEmployeeRequest;
use App\Models\EmployeeInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeInfomationController extends Controller
{
    public function index()
    {
        $employees = EmployeeInformation::orderBy('id', 'desc')->get();

        return response()->json($employees);
    }

    public function show($user_id)
    {
        $employee = EmployeeInformation::find($user_id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        return response()->json($employee);
    }

    public function create(StoreEmployeeRequest $request)
    {
        $user = User::create([
            'name' => $request->employee_infomations['full_name'],
            'email' => $request->employee_infomations['email'],
            'password' => Hash::make('123456')
        ]);

        $employee = EmployeeInformation::create(array_merge($request->validated(), ['user_id' => $user->id]));

        return response()->json($employee, 201);
    }
}
