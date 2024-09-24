<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    use HasFactory;

    protected $table = 'employee_details';

    protected $fillable = [
        'user_id',
        'position',
        'department',
        'start_date',
        'contract_type',
        'contract_end_date',
        'years_of_experience',
    ];
}
