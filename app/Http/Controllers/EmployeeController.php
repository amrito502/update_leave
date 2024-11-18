<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\EmployeeCertificate;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['department', 'designation', 'role', 'user'])->get();
        return view('pages.employee.index', compact('employees'));
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('pages.employee.show', compact('employee'));
    }
    public function create()
    {
        $employees = Employee::all();
        $departments = Department::all();
        $designations = Designation::all();
        $users = User::all();
        $roles = Role::all();
        return view('pages.employee.create', compact('departments', 'designations', 'users', 'roles', 'employees'));
    }

    public function store(Request $request, Employee $employee)
    {
        //    $request->validate([
        //         'first_name' => 'required',
        //         'last_name' => 'required',
        //         'email' => 'nullable|email',
        //         'phone' => 'nullable',
        //         'department_id' => 'required',
        //         'designation_id' => 'required',
        //         'role_id' => 'required',
        //         'date_of_joining' => 'nullable|date',
        //     ]);

        $latestEmployee = Employee::latest('id')->first();
        if ($latestEmployee) {
            $newEmployeeCode = 'EMP-' . str_pad((int)substr($latestEmployee->employee_code, 4) + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newEmployeeCode = 'EMP-001';
        }
        $randomNumber = rand(100, 999);
        $newEmployeeCode .= '-' . $randomNumber;

        $employee = new Employee();
        $employee->employee_code = $newEmployeeCode;
        $employee->first_name = trim($request->first_name);
        $employee->middle_name = trim($request->middle_name);
        $employee->last_name = trim($request->last_name);
        $employee->username = trim($request->username);
        $employee->email = trim($request->email);
        $employee->address = trim($request->address);
        $employee->phone = trim($request->phone);
        $employee->dob = trim($request->dob);
        $employee->user_id = auth()->user()->id;
        $employee->department_id = trim($request->department_id);
        $employee->designation_id = trim($request->designation_id);
        $employee->role_id = trim($request->role_id);
        $employee->date_of_joining = trim($request->date_of_joining);

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
    }
    public function edit($id)
    {
        $employee_find = Employee::find($id);
        $employees = Employee::all();
        $departments = Department::all();
        $designations = Designation::all();
        $users = User::all();
        $roles = Role::all();
        $get_employees = Employee::with(['department', 'designation', 'role', 'user'])->get();
        return view('pages.employee.edit', compact('employee_find', 'get_employees', 'employees', 'departments', 'designations', 'users', 'roles'));
    }
    public function update(Request $request, $id)
    {
        $latestEmployee = Employee::latest('id')->first();
        if ($latestEmployee) {
            $newEmployeeCode = 'EMP-' . str_pad((int)substr($latestEmployee->employee_code, 4) + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newEmployeeCode = 'EMP-001';
        }
        $randomNumber = rand(100, 999);
        $newEmployeeCode .= '-' . $randomNumber;

        $employee = Employee::find($id);
        $employee->employee_code = $newEmployeeCode;
        $employee->first_name = trim($request->first_name);
        $employee->middle_name = trim($request->middle_name);
        $employee->last_name = trim($request->last_name);
        $employee->username = trim($request->username);
        $employee->email = trim($request->email);
        $employee->address = trim($request->address);
        $employee->phone = trim($request->phone);
        $employee->dob = trim($request->dob);
        $employee->user_id = auth()->user()->id;
        $employee->department_id = trim($request->department_id);
        $employee->designation_id = trim($request->designation_id);
        $employee->role_id = trim($request->role_id);
        $employee->date_of_joining = trim($request->date_of_joining);
        $employee->update();
        return redirect()->route('employees.index')->with('success', 'Employee Updated successfully');
    }
    public function delete($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee Deleted successfully');
    }







    public function uploadCertificates(Request $request)
    {
        $request->validate([
            'certificates' => 'required|array|max:6',
            'certificates.*' => 'mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        foreach ($request->file('certificates') as $file) {
            $path = $file->store('certificates', 'public');
            EmployeeCertificate::create([
                'employee_id' => $request->employee_id,
                'document_name' => $file->getClientOriginalName(),
                'document_path' => $path,
            ]);
        }

        return redirect()->back()->with('success', 'Certificates uploaded successfully!');
    }
    public function documents()
    {
        $employees = Employee::all();
        $employeeCertificates = EmployeeCertificate::all();
        return view('pages.employee.documents', compact('employeeCertificates', 'employees'));
    }
    public function employee_under_documents($employeeId)
    {
        $getEmployee = Employee::find($employeeId);
        $employeeCertificates = $getEmployee->employeeCertificate;
        $employees = Employee::all();
        return view('pages.employee.employee_un_doc', compact('employees', 'employeeCertificates'));
    }
}
