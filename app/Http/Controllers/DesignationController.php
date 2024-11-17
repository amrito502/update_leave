<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index(){
        $departments = Department::all();
        $designations = Designation::with('department')->get();
        return view('pages.designation.index', compact('designations','departments'));
    }

    public function show($id){}
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:designations,name',
            'description' => 'nullable|string',
            'department_id' => 'required|exists:departments,id',
        ]);

        Designation::create($validatedData);
        return redirect()->route('designations.index')->with('success', 'Designation created successfully.');
    }
    public function edit($id){
        $designation = Designation::findOrFail($id);
        $departments = Department::all();
        return view('pages.designation.edit', compact('designation', 'departments'));
    }
    public function update(Request $request, $id){
        $designation = Designation::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:designations,name,' . $designation->id,
            'description' => 'nullable|string',
            'department_id' => 'required|exists:departments,id',
        ]);

        $designation->update($validatedData);

        return redirect()->route('designations.index')->with('success', 'Designation updated successfully.');
    }
    public function delete($id){
        $designation = Designation::findOrFail($id);
        $designation->delete();

        return redirect()->route('designations.index')->with('success', 'Designation deleted successfully.');
    }
}
