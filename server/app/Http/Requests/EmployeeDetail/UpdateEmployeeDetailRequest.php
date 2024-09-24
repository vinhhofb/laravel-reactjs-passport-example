<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust as needed for authorization logic
    }

    public function rules()
    {
        return [
            'position' => 'sometimes|string',
            'department' => 'sometimes|string',
            'start_date' => 'sometimes|date',
            'contract_type' => 'sometimes|string',
            'contract_end_date' => 'sometimes|date',
            'years_of_experience' => 'sometimes|integer',
        ];
    }
}
