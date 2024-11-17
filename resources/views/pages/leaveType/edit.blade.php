@extends('master')
@section('meta_title','Edit Leave Type')
@section('admin_page_header','Edit Leave Type')
@section('content')

<div class="table-container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <h4 class="mt-2">
                                    <div class="icon-check-square text-success"> Edit Leave Type : </div>
                                </h4>
                            </div>
                            <div class="col-md-6">
                                @can('view role')
                                    <a href="{{ route('leave_type.index') }}" class="btn btn-success float-right mt-2">Leave Types</a>
                                @endcan
                            </div>
                        </div>
                </div>
                <div class="">
                    <form action="{{ route('leave_type.update',$leaveType->id) }}" method="post">
                        @csrf   
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ $leaveType->name }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Days Allowed</label>
                            <input type="number" name="days_allowed" value="{{ $leaveType->days_allowed }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection