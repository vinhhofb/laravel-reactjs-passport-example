<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveBalance extends Model
{
    use HasFactory;

    protected $table = 'employee_leave_balances';

    protected $fillable = [
        'user_id',
        'annual_leave_days',
        'used_leave_days',
        'remaining_leave_days',
        'hours_in_day',
    ];
}
