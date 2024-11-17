<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Newstudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class NewstudentController extends Controller
{
    public function index(){
        return view("new_student.index");
    }

    public function store(Request $request)
    {
        // Validate the request
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string',
        //     'email' => 'required|email|unique:students,email',
        //     'phone' => 'nullable|string',
        //     'class' => 'required|string',
        //     'branch' => 'required|string',
        //     'shift' => 'nullable|string',
        //     'gender' => 'required|string',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // Generate unique student ID
        $sid = Newstudent::generateUniqueId($request->gender, $request->branch, $request->class);

        // Create the student
        Newstudent::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'class' => $request->class,
            'branch' => $request->branch,
            'shift' => $request->shift,
            'gender' => $request->gender,
            'sid' => $sid,
        ]);

        return redirect()->back()->with('success', 'Student added successfully!');
    }
}



