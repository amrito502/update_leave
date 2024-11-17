@extends('master')
@section('meta_title','Roles')
@section('admin_page_header','Roles')
@section('content')
<div class="table-container">
    <div class="">
        <div class="">
            @if (session('status'))
                <div class="alert alert-success mt-3" role="alert">{{ session('status') }}</div>
            @endif
            <div class="">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mt-2">Roles & Permissions : </h4>
                    </div>
                    <div class="col-md-6">
                        @can('create role')<a href="{{ route('roles.create') }}" class="btn btn-success float-right mt-2">Add
                            Role</a>@endcan
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="copy-print-csv" class="table custom-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                @canany(['edit role','delete role'])
                                <th>Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('give permission')<a href="{{ url('roles/'.$role->id.'/give-permission') }}" class="btn btn-success">
                                       Add / Edit Role Permission</a>@endcan
                                    @can('edit role')<a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-info">Edit</a>@endcan
                                    @can('delete role')<a href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-danger">Delete</a>@endcan
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