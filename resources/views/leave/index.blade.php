@extends('master')
@section('content')

 <!-- Your Previous Leave Requests -->
 <div class="mt-5">
    <h4>Your Leave Requests</h4>
  
        <table class="table">
            <thead>
                <tr>
                    <th>Leave Name</th>
                    <th>Status</th>
                    @can('approve-leave')
                        <th>Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach($leaveRequests as $leaveRequest)
                    <tr>
                        <td>{{ $leaveRequest->name }}</td>
                        <td>
                            @if($leaveRequest->status == 'pending')
                                <span class="text-warning">Pending</span>
                            @elseif($leaveRequest->status == 'approved')
                                <span class="text-success">Approved</span>
                            @else
                                <span class="text-danger">Rejected</span>
                            @endif
                        </td>
                        @can('approve-leave')  <!-- Ensure only authorized users see the action buttons -->
                            <td>
                                @if($leaveRequest->status == 'pending')
                                    <form action="{{ route('leave.approve', $leaveRequest) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                    </form>
                                    <form action="{{ route('leave.reject', $leaveRequest) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                    </form>
                                @elseif($leaveRequest->status !== 'pending')
                                <a href="" class="btn btn-sm btn-success">Edit</a>
                                    {{-- <span class="text-success">Approved</span> --}}
                                {{-- @elseif($leaveRequest->status == 'rejected')
                                    <span class="text-danger">Rejected</span> --}}
                                @endif
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>


@endsection