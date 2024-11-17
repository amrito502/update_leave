@extends('master')
@section('meta_title','Create User')
@section('admin_page_header', 'Create User')
@section('content')

    <div class="table-container">
        <div class="row">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <h4 class="mt-2">
                                    <div class="icon-check-square text-success"> Create User : </div>
                                </h4>
                            </div>
                            <div class="col-md-6">
                                @can('view user')
                                    <a href="{{ route('users.index') }}" class="btn btn-success float-right mt-2">Users</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="">

                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Emai</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <select name="roles[]" multiple class="form-control">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
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
