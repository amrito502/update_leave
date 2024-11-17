@extends('master')
@section('meta_title','Edit Department')
@section('admin_page_header','Edit Department')
@section('content')

<div class="table-container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <h4 class="mt-2">
                                    <div class="icon-check-square text-success"> Edit Department : </div>
                                </h4>
                            </div>
                            <div class="col-md-6">
                                @can('view role')
                                    <a href="{{ route('departments.index') }}" class="btn btn-success float-right mt-2">Departments</a>
                                @endcan
                            </div>
                        </div>
                </div>
                <div class="">
                    <form action="{{ route('department.update',$department->id) }}" method="post">
                        @csrf   
                        <div class="mb-3">
                            <label for="">Role Name</label>
                            <input type="text" name="name" value="{{ $department->name }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ $department->description }}</textarea>
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