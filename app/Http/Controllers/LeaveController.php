<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    // =================================
    // ==========start-leave-type=======
    public function index(){
        $leaveTypes = LeaveType::all();
        return view('pages.leaveType.index', compact('leaveTypes'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'days_allowed' => 'nullable|string',
        ]);

        LeaveType::create($request->all());
        
        return redirect()->back()->with('success', 'Leave Type created successfully.');
    }
    public function edit($id){
        $leaveType = LeaveType::find($id);
        return view('pages.leaveType.edit', compact('leaveType'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'days_allowed' => 'nullable|string',
        ]);
        $leaveType = LeaveType::find($id);
        $leaveType->update($request->all());
        
        return redirect()->route('leave_type.index')
                         ->with('success', 'Leave Type updated successfully.');
    }
    public function delete($id){
        $leaveType = LeaveType::find($id);
        $leaveType->delete();
        return redirect()->route('leave_type.index')
                         ->with('success', 'Leave Type deleted successfully.');
    }

    // =========end-leave-type========
    // ===============================

    // ========apply-leave+all-leave=====


}
