<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeInformation extends Model
{
    use HasFactory;

    protected $table = 'employee_infomations';

    protected $fillable = [
        'user_id',
        'full_name',
        'gender',
        'date_of_birth',
        'nationality',
        'identity_number',
        'address',
        'phone_number',
        'email',
        'avatar'
    ];
}
