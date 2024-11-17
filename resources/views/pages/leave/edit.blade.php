@extends('master')
@section('meta_title', 'Apply Leave Edit')
@section('admin_page_header', 'Apply Leave Edit')
@section('content')

    <div class="row">
        <div class="col-md-6">
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
                                            <div class="icon-check-square text-success"> Apply Leave Edit : </div>
                                        </h4>
                                    </div>
                                    <div class="col-md-6">
                                        @can('view employee')
                                            <a href="{{ route('leave.index') }}"
                                                class="btn btn-success float-right mt-2">Leave Applications</a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <form action="{{ route('leave.update',$leaveRequest->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="employee_id" class="form-label">Employee</label>
                                                <select class="form-control @error('employee_id') is-invalid @enderror"
                                                    id="employee_id" name="employee_id" required>
                                                    <option value="" style="background: rgb(231, 232, 233); font-size: 15px;">
                                                        Select a Employee</option>
                                                        @foreach ($employees as $employee)
                                                        <option value="{{ $employee->id }}"
                                                            {{ old('employee_id', $leaveRequest->employee_id) == $employee->id ? 'selected' : '' }}>
                                                            {{ $employee->first_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
        
                                            <div class="mb-3">
                                                <label for="leave_type_id" class="form-label">Leave Type</label>
                                                <select class="form-control @error('leave_type_id') is-invalid @enderror"
                                                    id="leave_type_id" name="leave_type_id" required>
                                                    <option value="" style="background: rgb(231, 232, 233); font-size: 15px;">
                                                        Select a LeaveType</option>
                                                        @foreach ($leaveTypes as $leave_type)
                                                        <option value="{{ $leave_type->id }}"
                                                            {{ old('leave_type_id', $leaveRequest->leave_type_id) == $leave_type->id ? 'selected' : '' }}>
                                                            {{ $leave_type->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
        
                                            <div class="mb-3">
                                                <label for="">Start Date</label>
                                                <input type="date" name="start_date" value="{{ $leaveRequest->start_date }}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">End Date</label>
                                                <input type="date" name="end_date" value="{{ $leaveRequest->end_date }}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Reason</label>
                                                <textarea name="reason" id="" class="form-control" cols="30" rows="10">{{ $leaveRequest->reason }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-info">Update Leave</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
