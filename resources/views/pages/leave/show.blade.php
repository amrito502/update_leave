@extends('master')
@section('meta_title', 'Leave Application Details')
@section('admin_page_header', 'Leave Application Details')
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
                            <h4 class="icon-check-square text-success mt-2"> Leave Application Details : </h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('leave.index') }}" class="btn btn-success float-right mt-2">Leave Applications</a>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="copy-print-csv" class="table custom-table">

                                <div>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> ID</strong> - <span>{{ $leaveRequest->id ?? 'N/A' }}</span></p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> Employee</strong> -
                                        <span>{{ $leaveRequest->employee->first_name ?? 'N/A' }}</span>
                                    </p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> Leave Type</strong> -
                                        <span>{{ $leaveRequest->leaveType->name ?? 'N/A' }}</span>
                                    </p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> Start Date</strong> - <span>{{ $leaveRequest->start_date ?? 'N/A' }}</span>
                                    </p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> End Date</strong> - <span>{{ $leaveRequest->end_date ?? 'N/A' }}</span></p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> Total Days</strong> -
                                        <span>{{ $leaveRequest->days_requested ?? 'N/A' }}</span>
                                    </p>
                                    <p class="mb-2"><strong><span class="icon-check-square text-info"></span> Approved_by</strong> - <span>{{ $leaveRequest->user->name ?? 'N/A' }}</span>
                                    </p>
                                    <p class="mb-3"><strong><span class="icon-check-square text-info"></span> status</strong> -
                                        <span>
                                            @if ($leaveRequest->status == 'pending')
                                                <span class="text-warning">Pending</span>
                                            @elseif($leaveRequest->status == 'approved')
                                                <span class="text-success">Approved</span>
                                            @else
                                                <span class="text-danger">Rejected</span>
                                            @endif
                                        </span>
                                    </p>

                                    <p class="mb-3"><strong><span class="icon-check-square text-info"></span> Status Manage</strong> -
                                        <span> @can('approve-leave')
                                                <span>
                                                    @if ($leaveRequest->status == 'pending')
                                                        <form action="{{ route('leave.approve', $leaveRequest) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit"
                                                                class="btn btn-success btn-sm">Approve</button>
                                                        </form>
                                                        <form action="{{ route('leave.reject', $leaveRequest) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                                        </form>
                                                    @elseif($leaveRequest->status !== 'pending')
                                                        <a href="{{ route('leave_status.edit', $leaveRequest->id) }}"
                                                            class="btn btn-sm btn-success">Edit</a>
                                                    @endif
                                                </span>
                                            @endcan
                                        </span>
                                    </p>
                                    <p class="mb-4"><strong><span class="icon-check-square text-info"></span> Action</strong> -
                                        <span>
                                            <a href="{{ route('leave.edit', $leaveRequest->id) }}"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <a onclick="return confirm('Are you sure you want to delete this leave?')"
                                                href="{{ route('leave.delete', $leaveRequest->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a></span>
                                    </p>
                                    <p class="mb-3" style="width: 60%; height: auto;"><strong><span class="icon-check-square text-info"></span> Reason</strong> - <span>{{ $leaveRequest->reason ?? 'N/A' }}</span></p>


                                </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
