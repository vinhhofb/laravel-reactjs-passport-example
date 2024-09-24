<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaveRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('leave_requests')->insert([
            [
                'start_time' => Carbon::now()->addDays(1)->toDateTimeString(),
                'end_time' => Carbon::now()->addDays(2)->toDateTimeString(),
                'reason' => 'Vacation',
                'status' => 'pending',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => Carbon::now()->addDays(3)->toDateTimeString(),
                'end_time' => Carbon::now()->addDays(4)->toDateTimeString(),
                'reason' => 'Medical Leave',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => Carbon::now()->addDays(5)->toDateTimeString(),
                'end_time' => Carbon::now()->addDays(6)->toDateTimeString(),
                'reason' => 'Personal Leave',
                'status' => 'rejected',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => Carbon::now()->addDays(7)->toDateTimeString(),
                'end_time' => Carbon::now()->addDays(8)->toDateTimeString(),
                'reason' => 'Family Emergency',
                'status' => 'pending',
                'user_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => Carbon::now()->addDays(9)->toDateTimeString(),
                'end_time' => Carbon::now()->addDays(10)->toDateTimeString(),
                'reason' => 'Bereavement Leave',
                'status' => 'approved',
                'user_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
