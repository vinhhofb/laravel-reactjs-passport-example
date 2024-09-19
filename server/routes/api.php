<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserImageModelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'getUser']);
    Route::get('/checkin', [AttendanceController::class, 'checkin']);
    Route::post('/upload-image', [UserImageModelController::class, 'captureModel']);
    Route::get('/user-image-models', [UserImageModelController::class, 'getUserImages']);
});


Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('/authenticate', function() {
    return response()->json(['error' => 'Unauthorized'], 401);
})->name('authenticate');
