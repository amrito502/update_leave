@extends('master')
@section('meta_title', 'Apply Leave Status Edit')
@section('admin_page_header', 'Apply Leave Status Edit')
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
                                            <div class="icon-check-square text-success"> Leave Status Edit : </div>
                                        </h4>
                                    </div>
                                    <div class="col-md-6">
                                        @can('view employee')
                                            <a href="{{ route('leave.index') }}" class="btn btn-success float-right mt-2">Leave
                                                Applications</a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <form action="{{ route('leave_status.update', $getLeaveRequest->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select class="form-control @error('status') is-invalid @enderror"
                                                    id="status" name="status" required>
                                                    <option value=""
                                                        style="background: rgb(231, 232, 233); font-size: 15px;">
                                                        Select a status
                                                    </option>
                                                    <option value="pending"
                                                        {{ old('status', $getLeaveRequest->status) == 'pending' ? 'selected' : '' }}>
                                                        Pending
                                                    </option>
                                                    <option value="approved"
                                                        {{ old('status', $getLeaveRequest->status) == 'approved' ? 'selected' : '' }}>
                                                        Approved
                                                    </option>
                                                    <option value="rejected"
                                                        {{ old('status', $getLeaveRequest->status) == 'rejected' ? 'selected' : '' }}>
                                                        Rejected
                                                    </option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-info">Update Status</button>
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
