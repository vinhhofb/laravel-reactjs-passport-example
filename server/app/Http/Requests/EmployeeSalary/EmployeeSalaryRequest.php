<?php

namespace App\Http\Requests\EmployeeSalary;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeSalaryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'user_id' => 'sometimes|integer',
            'basic_salary' => 'sometimes|numeric',
            'unit' => 'nullable|string',
            'allowance' => 'nullable|numeric',
            'bonus' => 'nullable|numeric',
            'penalty' => 'nullable|numeric',
        ];
    }
}
