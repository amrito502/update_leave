@extends('master')
@section('meta_title', 'Reports in Leave')
@section('admin_page_header', 'Reports in Leave')
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
                            <h4 class="mt-2 icon-check-square text-success"> Leave Reports List : </h4>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="copy-print-csv" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>Leave Reason</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Days</th>
                                    <th>Approved_by</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaveRequests as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->employee->first_name . ' ' . $item->employee->last_name . ' -ID : '. ' ' . $item->employee->employee_code ?? 'N/A' }}</td>
                                        <td>{{ $item->leaveType->name ?? 'N/A' }}</td>
                                        <td>{{ $item->reason ?? 'N/A' }}</td>
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
