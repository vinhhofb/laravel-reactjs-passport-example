<?php

namespace App\Http\Requests\EmployeeLeaveBalance;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeLeaveBalanceRequest extends FormRequest
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
            'annual_leave_days' => 'required|integer',
            'used_leave_days' => 'required|integer',
            'remaining_leave_days' => 'required|integer',
            'hours_in_day' => 'required|integer',
        ];
    }
}
