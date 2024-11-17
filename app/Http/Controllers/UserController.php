<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view user',['only'=> ['index']]);
        $this->middleware('permission:create user',['only'=> ['create','store']]);
        $this->middleware('permission:edit user',['only'=> ['edit','update']]);
        $this->middleware('permission:delete user',['only'=> ['destory']]);
    }


    public function index(){
        $users = User::get();
        
        return view('role-permission.user.index',[
            'users' => $users,
           
        ]);
    }
    

    public function create(){
        $roles = Role::pluck('name', 'name')->all();
        return view('role-permission.user.create',[
            'roles' => $roles,
        ]);
    }


    public function store(Request $request){
        $request->validate([
            'name' =>'required','string','unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
            'roles'=> 'required',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->roles);

        return redirect()->route('users.index')->with('status','User created successfully');
    }


    public function edit(User $user){
       
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        return view('role-permission.user.edit',[
            'user'=>$user,
            'roles'=>$roles,
            'userRoles'=>$userRoles
        ]);
    }


    public function update(Request $request, User $user){
        $request->validate([
            'name' =>'required',
            'roles'=> 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);

        $user->syncRoles($request->roles);

        return redirect()->route('users.index')->with('status','User Updated successfully');
    }


    public function destory($userId){
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect()->route('users.index')->with('status','User Deleted successfully');
    }
    
}
