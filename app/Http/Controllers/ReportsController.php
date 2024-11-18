<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    
    public function index()
    {
        $leaveRequests = LeaveRequest::with(['approved_by', 'user', 'leaveType', 'employee'])->get();
        return view('pages.reports.leave', ['leaveRequests' => $leaveRequests]);
    }
}
