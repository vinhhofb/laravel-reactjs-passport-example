<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveRequest\StoreLeaveRequest;
use App\Models\LeaveRequest;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $leaveRequests = LeaveRequest::all();
        return response()->json($leaveRequests);
    }

    public function store(StoreLeaveRequest $request)
    {
        $leaveRequest = LeaveRequest::create($request->validated());

        return response()->json($leaveRequest, 201);
    }
}
