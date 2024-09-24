<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    use HasFactory;

    protected $table = 'employee_salarys';

    protected $fillable = [
        'user_id',
        'basic_salary',
        'unit',
        'allowance',
        'bonus',
        'penalty',
    ];
}
