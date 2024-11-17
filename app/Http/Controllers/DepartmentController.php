<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::all();
        
        return view('pages.department.index',compact('departments'));
    }

    public function show($id){}
    public function create(){}
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name',
            'description' => 'nullable|string',
        ]);
        Department::create($validatedData);
        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }
    public function edit($id){
        $department = Department::findOrFail($id);
        return view('pages.department.edit', compact('department'));
    }
    public function update(Request $request, $id){
        $department = Department::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name,' . $department->id,
            'description' => 'nullable|string',
        ]);

        $department->update($validatedData);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }
    public function delete($id){
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
