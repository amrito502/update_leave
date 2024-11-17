@extends('master')
@section('meta_title', 'Create Employee')
@section('admin_page_header', 'Create Employee')
@section('content')

    <div class="table-container">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div style="border-left: 3px solid green; color: green; background: rgb(233, 229, 229)!important;"
                        class="alert alert-white mt-3" role="alert">{{ session('success') }}</div>
                @endif
                <div class="card">
                    <div class="">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <h4 class="mt-2">
                                    <div class="icon-check-square text-success"> Create Employee : </div>
                                </h4>
                            </div>
                            <div class="col-md-6">
                                @can('view employee')
                                    <a href="{{ route('employees.index') }}"
                                        class="btn btn-success float-right mt-2">Employees</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Employee Code</label>
                                        <input type="text" name="employee_code" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">First Name</label>
                                        <input type="text" name="first_name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Middle Name</label>
                                        <input type="text" name="middle_name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Last Name</label>
                                        <input type="text" name="last_name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Phone</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Address</label>
                                        <textarea name="address" class="form-control" id=""></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label for="">Date Of Birth</label>
                                        <input type="date" name="dob" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="department_id" class="form-label">Department</label>
                                        <select class="form-control @error('department_id') is-invalid @enderror"
                                            id="department_id" name="department_id" required>
                                            <option value="" style="background: rgb(231, 232, 233); font-size: 15px;">
                                                Select a Department</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">
                                                    {{ $department->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="designation_id" class="form-label">Designation</label>
                                        <select class="form-control @error('designation_id') is-invalid @enderror"
                                            id="designation_id" name="designation_id" required>
                                            <option value="" style="background: rgb(231, 232, 233); font-size: 15px;">
                                                Select a Designation</option>
                                            @foreach ($designations as $designation)
                                                <option value="{{ $designation->id }}">
                                                    {{ $designation->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="role_id" class="form-label">Role</label>
                                        <select class="form-control @error('role_id') is-invalid @enderror" id="role_id"
                                            name="role_id" required>
                                            <option value="" style="background: rgb(231, 232, 233); font-size: 15px;">
                                                Select a Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Joining Date</label>
                                        <input type="date" name="date_of_joining" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Choose Profile</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input"
                                                    id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="employee_profile_wrap ">
                                        <img class="employee_profile_img shadow"
                                            src="{{ asset('assets/img/no-image-available.png') }}" alt="profile">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-info">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row" style="margin-bottom:300px!important;">
        <div class="col-md-6">
            <div class="card mt-5">
               <form action="{{ route('employee.uploadCertificates') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-success">
                    <span class="text-white">Documents</span>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="employee_id" class="form-label">Select a Employee For Upload Multiple Document</label>
                        <select class="form-control @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id"
                            required>
                            <option value="" style="background: rgb(231, 232, 233); font-size: 15px;">
                                Select a Employee</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">
                                    @if($employee->first_name)
                                        {{ $employee->first_name . ' ' . $employee->middle_name . ' '. $employee->last_name . ' - ID : ' . $employee->employee_code }}
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="input-group mt-2">
                            <div class="custom-file">
                                <input type="file" name="certificates[]" accept="application/pdf,image/*" multiple class="custom-file-input" id="inputGroupFile02">
                                <label class="custom-file-label" for="inputGroupFile02"
                                    aria-describedby="inputGroupFileAddon02">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Upload Document</button>
                    </div>
                </div>
               </form>
            </div>
        </div>
    </div>


@endsection
