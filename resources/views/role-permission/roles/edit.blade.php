@extends('master')
@section('meta_title','Edit Role')
@section('admin_page_header','Edit Role')
@section('content')

<div class="table-container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <h4 class="mt-2">
                                    <div class="icon-check-square text-success"> Edit Role : </div>
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
                    <form action="{{ route('roles.update',$role->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Role Name</label>
                            <input type="text" name="name" value="{{ $role->name }}" class="form-control">
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