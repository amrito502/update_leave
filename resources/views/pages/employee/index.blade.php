@extends('master')
@section('meta_title', 'Employees')
@section('admin_page_header', 'Employees')
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
                            <h4 class="mt-2 icon-check-square text-success">Employee List : </h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('employee.create') }}" class="btn btn-success float-right mt-2">Add Employee</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="copy-print-csv" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $employee->employee_code }}</td>
                                        <td>{{ $employee->first_name . ' ' . $employee->last_name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->department->name ?? 'N/A' }}</td>
                                        <td>{{ $employee->designation->name ?? 'N/A' }}</td>
                                        <td>{{ $employee->role->name ?? 'N/A' }}</td>
                                        <td>
                                            <!-- Action Buttons -->
                                            <a href="{{ route('employee.show', $employee->id) }}"
                                                class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('employee.edit', $employee->id) }}"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <a onclick="return confirm('Are you sure you want to delete this employee?')"
                                                href="{{ route('employee.delete', $employee->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tasks-container">


        <div class="modal fade" id="addNewEmployee" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewTaskLabel">Create Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            @csrf
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="">Department Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Add Department Name">
                                </div>
                            </div>
                            <div class="modal-footer custom">
                                <div class="left-side">
                                    <button type="button" class="btn btn-link danger btn-block"
                                        data-dismiss="modal">Cancel</button>
                                </div>
                                <div class="divider"></div>
                                <div class="right-side">
                                    <button type="submit" class="btn btn-link success btn-block">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- =========edit department=========== --}}
        <div class="modal fade" id="EditNewEmployee" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewTaskLabel">Edit Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            @csrf
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="">Department Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Department Name">
                                </div>
                            </div>
                            <div class="modal-footer custom">
                                <div class="left-side">
                                    <button type="button" class="btn btn-link danger btn-block"
                                        data-dismiss="modal">Cancel</button>
                                </div>
                                <div class="divider"></div>
                                <div class="right-side">
                                    <button type="submit" class="btn btn-link success btn-block">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
