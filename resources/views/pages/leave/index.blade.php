@extends('master')
@section('meta_title', 'Leave Manage')
@section('admin_page_header', 'Leave Manage')
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
                            <h4 class="mt-2">Leave List : </h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('leave.create') }}" class="btn btn-success float-right mt-2">Add Leave</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="copy-print-csv" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Days</th>
                                    <th>Approved_by</th>
                                    <th>status</th>
                                    <th>Status Manage</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaveRequests as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->employee->first_name ?? 'N/A' }}</td>
                                        <td>{{ $item->leaveType->name ?? 'N/A' }}</td>
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->end_date }}</td>
                                        <td>{{ $item->days_requested }}</td>
                                        <td>{{ $item->user->name ?? 'N/A' }}</td>
                                        <td>
                                            @if ($item->status == 'pending')
                                                <span class="text-warning">Pending</span>
                                            @elseif($item->status == 'approved')
                                                <span class="text-success">Approved</span>
                                            @else
                                                <span class="text-danger">Rejected</span>
                                            @endif
                                        </td>
                                        @can('approve-leave')
                                            <!-- Ensure only authorized users see the action buttons -->
                                            <td>
                                                @if ($item->status == 'pending')
                                                    <form action="{{ route('leave.approve', $item) }}" method="POST"
                                                        style="display:inline-block;">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                                    </form>
                                                    <form action="{{ route('leave.reject', $item) }}" method="POST"
                                                        style="display:inline-block;">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                                    </form>
                                                @elseif($item->status !== 'pending')
                                                    <a href="{{ route('leave_status.edit',$item->id) }}" class="btn btn-sm btn-success">Edit</a>
                                                    {{-- <span class="text-success">Approved</span> --}}
                                                    {{-- @elseif($leaveRequest->status == 'rejected')
                                                <span class="text-danger">Rejected</span> --}}
                                                @endif
                                            </td>
                                        @endcan
                                        <td>
                                            <a href="" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('leave.edit', $item->id) }}"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <a onclick="return confirm('Are you sure you want to delete this leave?')"
                                                href="{{ route('leave.delete', $item->id) }}"
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

@endsection
