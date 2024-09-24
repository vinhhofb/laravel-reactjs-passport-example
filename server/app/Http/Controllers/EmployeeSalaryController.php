<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeSalary\EmployeeSalaryRequest;
use App\Models\EmployeeSalary;
use Illuminate\Http\Response;

class EmployeeSalaryController extends Controller
{
    public function index()
    {
        $salaries = EmployeeSalary::all();
        return response()->json($salaries, Response::HTTP_OK);
    }

    public function show($id)
    {
        $salary = EmployeeSalary::findOrFail($id);
        return response()->json($salary, Response::HTTP_OK);
    }

    public function update(EmployeeSalaryRequest $request, $id)
    {
        $salary = EmployeeSalary::findOrFail($id);

        $salary->update($request->validated());
        return response()->json($salary, Response::HTTP_OK);
    }
}
