<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function checkin(Request $request)
    {
        $user = $request->user();
        $currentDate = Carbon::now()->toDateString();

        // Check if the user has already checked in today
        $existingCheckin = DB::table('attendances')
            ->where('user_id', $user->id)
            ->whereDate('checkin_time', $currentDate)
            ->first();

        if ($existingCheckin) {
            return response()->json(['message' => 'You have already checked in today'], 200);
        }

        DB::table('attendances')->insert([
            'user_id' => $user->id,
            'checkin_time' => Carbon::now(),
        ]);

        return response()->json(['message' => 'Check-in successful'], 200);
    }
}
