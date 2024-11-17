<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\LeaveBalance;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class LeaverequestController extends Controller
{
    public function index(LeaveRequest $lreq)
    {
        $leaveRequests = LeaveRequest::with(['approved_by', 'user', 'leaveType', 'employee'])->get();
        return view('pages.leave.index', ['leaveRequests' => $leaveRequests, 'lreq' => $lreq]);
    }

    public function create()
    {
        $employees = Employee::all();
        $leaveTypes = LeaveType::all();
        return view('pages.leave.apply', compact('leaveTypes', 'employees'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'days_requested' => 'nullable|numeric',
        ]);
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        $total_days = $start_date->diffInDays($end_date) + 1;
        $leave = new LeaveRequest();
        $leave->user_id = auth()->user()->id;
        $leave->employee_id = trim($request->employee_id);
        $leave->leave_type_id = trim($request->leave_type_id);
        $leave->start_date = trim($request->start_date);
        $leave->end_date = trim($request->end_date);
        $leave->days_requested = $total_days;
        $leave->reason = trim($request->reason);
        $leave->approved_by = auth()->user()->id;
        $leave->status = trim('pending');
        $leave->save();
        return redirect()->route('leave.index')->with('success', 'Leave Apply successfully!');
    }

    public function edit($id)
    {
        $employees = Employee::all();
        $leaveTypes = LeaveType::all();
        $leaveRequest = LeaveRequest::find($id);
        return view('pages.leave.edit', compact('leaveTypes', 'employees', 'leaveRequest'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'days_requested' => 'nullable|numeric',
        ]);

        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        $total_days = $start_date->diffInDays($end_date) + 1;

        $leave = LeaveRequest::find($id);
        $leave->user_id = auth()->user()->id;
        $leave->employee_id = trim($request->employee_id);
        $leave->leave_type_id = trim($request->leave_type_id);
        $leave->start_date = trim($request->start_date);
        $leave->end_date = trim($request->end_date);
        $leave->days_requested = $total_days;
        $leave->reason = trim($request->reason);
        $leave->approved_by = auth()->user()->id;
        $leave->update();
        return redirect()->route('leave.index')->with('success', 'Leave Apply Updated successfully!');
    }

    public function delete($id)
    {
        $leave = LeaveRequest::find($id);
        $leave->delete();
        return redirect()->route('leave.index')->with('success', 'Leave Apply Deleted successfully!');
    }

    public function approve(leaverequest $leaveRequest)
    {
        if (Auth::user()->cannot('approve-leave')) {
            abort(403);
        }
        $leaveRequest->status = 'approved';
        $leaveRequest->save();
        return back()->with('status', 'Leave request approved!');
    }

    public function reject(leaverequest $leaveRequest)
    {
        if (Auth::user()->cannot('reject-leave')) {
            abort(403);
        }
        $leaveRequest->status = 'rejected';
        $leaveRequest->save();
        return back()->with('status', 'Leave request rejected!');
    }



    public function status_edit($id)
    {
        $leaveRequests = LeaveRequest::all();
        $getLeaveRequest = LeaveRequest::find($id);
        return view('pages.leave.update_status', compact('leaveRequests', 'getLeaveRequest'));
    }

    public function status_update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->status = $request->input('status');
        $leaveRequest->save();
        return redirect()->route('leave.index')->with('success', 'Leave request status updated successfully!');
    }
}
