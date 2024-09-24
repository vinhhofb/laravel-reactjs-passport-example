<?php

namespace App\Http\Requests\LeaveRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeaveRequest extends FormRequest
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
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'reason' => 'required|string|max:255',
            'status' => 'in:pending,approved,rejected',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
