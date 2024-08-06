<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUser(Request $request)
    {
        $attendances = DB::table('attendances')->where('user_id',$request->user()->id)->orderBy('id','desc')->get();
        $currentDate = Carbon::now()->toDateString();
        // Check if the user has already checked in today
        $attendanceToday = DB::table('attendances')
            ->where('user_id', $request->user()->id)
            ->whereDate('checkin_time', $currentDate)
            ->exists();
        return [
            'user' => $request->user(),
            'attendances' => $attendances,
            'attendanceToday' => $attendanceToday
        ];
    }
}
