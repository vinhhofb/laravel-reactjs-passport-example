<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EmployeeDetailController;
use App\Http\Controllers\EmployeeInfomationController;
use App\Http\Controllers\EmployeeLeaveBalanceController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserImageModelController;
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

    Route::post('/employee/create', [UserController::class, 'createEmployee']);
    Route::get('/countries', [CountryController::class, 'index']);


    Route::prefix('employees')->group(function () {
        Route::get('/', [EmployeeInfomationController::class, 'index']);
        Route::get('/{user_id}', [EmployeeInfomationController::class, 'show']);
    });

    Route::prefix('employees-detail')->group(function () {
        Route::get('/', [EmployeeDetailController::class, 'index']);
        Route::put('/{id}', [EmployeeDetailController::class, 'update']);
    });

    Route::prefix('employee-leave-balance')->group(function () {
        Route::get('/', [EmployeeLeaveBalanceController::class, 'index']);
        Route::put('/{id}', [EmployeeLeaveBalanceController::class, 'update']);
    });

    Route::prefix('employee-salaries')->group(function () {
        Route::get('/', [EmployeeSalaryController::class, 'index']);
        Route::put('/{id}', [EmployeeSalaryController::class, 'update']);
    });

    Route::prefix('leave-requests')->group(function () {
        Route::get('/', [LeaveRequestController::class, 'index']);
        Route::post('/create', [LeaveRequestController::class, 'store']);
    });

});


Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('/authenticate', function() {
    return response()->json(['error' => 'Unauthorized'], 401);
})->name('authenticate');
