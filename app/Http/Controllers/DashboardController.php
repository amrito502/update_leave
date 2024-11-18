<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\Department;
use App\Models\Designation;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use App\Models\EmployeeCertificate;
use App\Models\Notice;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        return view('pages.settings.index');
    }

    public function dashboard(){
        $departmentCount = Department::count();
        $designationCount = Designation::count();
        $leaveTypeCount = LeaveType::count();
        $leaveRequestCount = LeaveRequest::count();
        $employeeCount = Employee::count();
        $employeeCertificateCount = EmployeeCertificate::count();
        $userCount = User::count();
        $noticeCount = Notice::count();
        $approvedLeaveRequests = LeaveRequest::where('status', 'approved')->count();
        $pendingLeaveRequests = LeaveRequest::where('status', 'pending')->count();
        $rejectedLeaveRequests = LeaveRequest::where('status', 'rejected')->count();
        return view('dashboard', compact('approvedLeaveRequests','pendingLeaveRequests','rejectedLeaveRequests','departmentCount','designationCount','leaveTypeCount','leaveRequestCount','employeeCount','employeeCertificateCount','userCount','noticeCount'));
    }
}
