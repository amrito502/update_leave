<div class="mt-4 pt-5 container">
    @can('view role')<a href="{{ url('roles') }}" class="btn btn-info mx-2">Roles</a>@endcan
    @can('view permission')<a href="{{ url('permissions') }}" class="btn btn-success mx-2">Permissions</a>@endcan
    @can('view user')<a href="{{ url('users') }}" class="btn btn-success mx-2">Users</a>@endcan
    <hr>
</div>
