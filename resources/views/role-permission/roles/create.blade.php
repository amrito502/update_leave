@extends('master')
@section('meta_title','Create Role')
@section('admin_page_header','Create Role')
@section('content')

<div class="table-container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <h4 class="mt-2">
                                    <div class="icon-check-square text-success"> Create Role : </div>
                                </h4>
                            </div>
                            <div class="col-md-6">
                                @can('view role')
                                    <a href="{{ url('roles') }}" class="btn btn-success float-right mt-2">Roles</a>
                                @endcan
                            </div>
                        </div>
                </div>
                <div class="">
                    <form action="{{ url('roles') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Role Name</label>
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