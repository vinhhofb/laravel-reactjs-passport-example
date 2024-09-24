<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->truncate();
        $users = [
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('123456'),'type' => 1],
            ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Alice Johnson', 'email' => 'alice@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Bob Brown', 'email' => 'bob@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Charlie Davis', 'email' => 'charlie@example.com', 'password' => Hash::make('password123')],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
