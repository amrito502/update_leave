@extends('master')
@section('meta_title', 'Employee Details')
@section('admin_page_header', 'Employee Details')
@section('content')

    <div class="table-container">
        <div class="rows">
            <div class="col-md-12s">
                @if (session('success'))
                    <div style="border-left: 3px solid green; color: green; background: rgb(233, 229, 229)!important;"
                        class="alert alert-white mt-3" role="alert">{{ session('success') }}</div>
                @endif
                <div class="">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <h4 class="icon-check-square text-success mt-2"> Employee Details : </h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('employees.index') }}" class="btn btn-success float-right mt-2">Employees</a>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="copy-print-csv" class="table custom-table">
                                <div>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> ID</strong> - <span>{{ $employee->id ?? 'N/A' }}</span></p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> Employee ID</strong> - <span>{{ $employee->employee_code ?? 'N/A' }}</span></p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> Employee Name</strong> -
                                        <span>{{ $employee->first_name . ' ' . $employee->middle_name . ' ' . $employee->last_name ?? 'N/A' }}</span>
                                    </p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> Email</strong> -
                                        <span>{{ $employee->email ?? 'N/A' }}</span>
                                    </p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> Phone</strong> - <span>{{ $employee->phone ?? 'N/A' }}</span>
                                    </p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> Address</strong> - <span>{{ $employee->address ?? 'N/A' }}</span>
                                    </p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> Date Of Birth</strong> - <span>{{ $employee->dob ?? 'N/A' }}</span>
                                    </p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> Date of Joining</strong> - <span>{{ $employee->date_of_joining ?? 'N/A' }}</span>
                                    </p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> Department</strong> - <span>{{ $employee->department->name ?? 'N/A' }}</span></p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> Designation</strong> -
                                        <span>{{ $employee->designation->name ?? 'N/A' }}</span>
                                    </p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> Role</strong> - <span>{{ $employee->role->name ?? 'N/A' }}</span>
                                    </p>
                
                                    <p class="mb-4"><strong><span class="icon-check-square text-info"></span> Action</strong> -
                                        <span>
                                            <a href="{{ route('employee.edit', $employee->id) }}"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <a onclick="return confirm('Are you sure you want to delete this leave?')"
                                                href="{{ route('employee.delete', $employee->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a></span>
                                    </p>
                            
                                    <p class="mb-3"><strong><span class="icon-check-square text-info"></span> Employee Profile Photo</strong></p>
                                    <div>
                                        <div class="employee_profile_wrap mb-3" style="display: flex; justify-content: flex-start!important; margin-left: 30px;">
                                            <img class="employee_profile_img shadow"
                                                src="{{ asset('assets/img/no-image-available.png') }}" alt="profile">
                                        </div>
                                    </div>
                                </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
