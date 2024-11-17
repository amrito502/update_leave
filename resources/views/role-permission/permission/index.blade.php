@extends('master')
@section('meta_title','Permissions')
@section('admin_page_header','Permission')
@section('content')

<div class="table-container">
    <div class="rows">
        <div class="col-md-12s">
            @if (session('status'))
                <div class="alert alert-success mt-3" role="alert">{{ session('status') }}</div>
            @endif
            <div class="">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h4 class="mt-2">Create Permissions : </h4>
                    </div>
                    <div class="col-md-6">
                        @can('create permission')<a href="{{ route('permissions.create') }}" data-toggle="modal" data-target="#addNewTask" class="btn btn-success float-right mt-2">Add
                            Permission</a>@endcan
                    </div>
                </div>            
                <div class="table-responsive">
                    <table id="copy-print-csv" class="table custom-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                @canany(['edit permission','delete  permission'])
                                    <th>Action</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    @can('edit permission')<a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-info">Edit</a>@endcan
                                    @can('delete permission')<a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="btn btn-danger">Delete</a>@endcan
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

<div class="tasks-container">


<div class="modal fade" id="addNewTask" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewTaskLabel">Create Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('permissions') }}" method="post">
                    @csrf
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="">Permission Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Add Permission Name">
                        </div>
                    </div>
                    <div class="modal-footer custom">
                        <div class="left-side">
                            <button type="button" class="btn btn-link danger btn-block" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="divider"></div>
                        <div class="right-side">
                            <button type="submit" class="btn btn-link success btn-block">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection