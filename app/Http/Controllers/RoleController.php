<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view role',['only'=> ['index']]);
        $this->middleware('permission:create role',['only'=> ['create','store']]);
        $this->middleware('permission:edit role',['only'=> ['edit','update']]);
        $this->middleware('permission:delete role',['only'=> ['destory']]);
        $this->middleware('permission:give permission',['only'=> ['addPermissionToRole','updatePermissionToRole']]);
    }

    public function index(){
        $roles = Role::get();
        return view('role-permission.roles.index',[
            'roles' => $roles,
        ]);
    }
    

    public function create(){
        return view('role-permission.roles.create');
    }
    

    public function store(Request $request){
        $request->validate([
            'name' => 'required','string','unique:roles,name'
        ]);


        $role = Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index')->with('status','Role created successfully');


    }

    public function edit(Role $role){
        return view('role-permission.roles.edit',[
            'role'=> $role,
        ]);
    }

    public function update(Request $request, Role $role){
        $request->validate([
            'name' => 'required','string','unique:roles,name'.$role->id
        ]);


        $role->update([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index')->with('status','Role Updated successfully');
    }

    public function destory($roleId){
        Role::find($roleId)->delete();
        return redirect()->route('roles.index')->with('status','Role deleted successfully');
    }

    public function addPermissionToRole($roleId){
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
                            ->where('role_has_permissions.role_id',$role->id)
                            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                            ->all();
        return view('role-permission.roles.add-permission',[
            'role'=> $role,
            'permissions'=> $permissions,
            'rolePermissions'=> $rolePermissions,
        ]);
    }



    public function updatePermissionToRole(Request $request,$roleId){
        // $request->validate([
        //     'permission' =>'required',
        // ]);
        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('status','Permission Added To Role');
    }



}
