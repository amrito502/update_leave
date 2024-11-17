<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\leaverequest;
use App\Models\LeaveBalance;
use App\Models\LeaveType;
use Illuminate\Support\Facades\Auth;
class LeaverequestController extends Controller
{
    public function index()
    {
        // Get all leave types
        $Leaverequests = leaverequest::all();
        return view('leave.index', ['leaveRequests'=> $Leaverequests]);
    }
    public function apply(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

      

        // Create a leave request
        leaverequest::create([
            'user_id'=>Auth::user()->id,
            'name' => $request->name,
            'status' => 'pending',
        ]);

        return back()->with('status', 'Leave request submitted successfully!');
    }

    // Admin or Manager: Approve Leave
    public function approve(leaverequest $leaveRequest)
    {
        // Ensure only managers or admins can approve
        if (Auth::user()->cannot('approve-leave')) {
            abort(403);
        }

        $leaveRequest->status = 'approved';
        $leaveRequest->save();


        return back()->with('status', 'Leave request approved!');
    }

    // Admin or Manager: Reject Leave
    public function reject(leaverequest $leaveRequest)
    {
        // Ensure only managers or admins can reject
        if (Auth::user()->cannot('reject-leave')) {
            abort(403);
        }

        $leaveRequest->status = 'rejected';
        $leaveRequest->save();

        return back()->with('status', 'Leave request rejected!');
    }
}

