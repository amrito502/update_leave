@extends('master')
@section('meta_title','Edit Permission')
@section('admin_page_header','Edit Permission')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <h4>Edit Permission @can('view permission')<a href="{{ route('permissions.index') }}" class="btn btn-success float-end">Permissions</a>@endcan</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mt-2">Edit Permissions : </h4>
                            </div>
                            <div class="col-md-6">
                                @can('create role')<a href="{{ route('roles.create') }}" class="btn btn-success float-right mt-2">Permissions</a>@endcan
                            </div>
                        </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('permissions.update',$permission->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Permission Name</label>
                            <input type="text" name="name" value="{{ $permission->name }}" class="form-control">
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