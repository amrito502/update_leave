@extends('master')
@section('meta_title','Give Permission')
@section('admin_page_header','Give Permission')
@section('content')

<div class="table-container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success mt-3" role="alert">{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <h4 class="mt-2"><div class="icon-check-square text-success"> Give Permissions : </div></h4>
                        </div>
                        <div class="col-md-6">
                            @can('view role')<a href="{{ route('roles.index') }}" class="btn btn-success float-right mt-2">Roles</a>@endcan
                        </div>
                    </div>
                </div>
                <div class="">
                    <form action="{{ url('roles/' . $role->id . '/give-permission') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <h6 class="mb-3" style="color: rgb(185, 177, 177);">All Permissions</h6>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-md-3">
                                        <label style="font-size: 16px; margin-buttom: 10px!important;">
                                            <input type="checkbox" 
                                             id="all_permission" 
                                             name="permission[]"
                                             value="{{ $permission->name }}"
                                             {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                            />
                                            
                                            <span style="color: rgb(96 92 92); margin-left: 4px;">{{ $permission->name }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
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