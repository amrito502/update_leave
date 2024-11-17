@extends('master')
@section('admin_page_header','Create Permission')
@section('content')

<div class="table-container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <h4>Create Permission @can('view permission')<a href="{{ route('permissions.index') }}" class="btn btn-success float-end">Permissions</a>@endcan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('permissions') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Permission Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection