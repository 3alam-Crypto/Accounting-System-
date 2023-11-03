<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('user')->with('success', 'User Created successfully');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.user.role', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['sometimes', 'nullable', 'string', 'confirmed', Rules\Password::defaults()],
        ]);
        if ($request->filled('name')) {
            $user->name = $request->name;
        }
        
        if ($request->filled('email')) {
            $user->email = $request->email;
        }
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        
        return redirect()->route('user')->with('success', 'User updated successfully');
    }



    public function destroy(User $user)
    {
        if($user->hasRole('admin')){
            return back()->with('success', 'you are admin.');
        }
        $user->delete();

        return back()->with('success', 'User deleted successfully');
    }

    public function giveRole(Request $request, User $user)
    {
        
        $roleName = $request->input('role');
        $role = Role::where('name', $roleName)->first();
    
        if($user->hasRole($role)){
            return back()->with('success', 'Role already assigned to the user.');
        }
    
        $user->assignRole($role);
    
        return back()->with('success', 'Role assigned successfully.');
        
    }

    public function revokeRole(User $user, Role $role)
    {
        if($user->hasRole($role)){
            $user->removeRole($role);
            return back()->with('success', 'Role revoke successfully');
        }

        return back()->with('success', 'Role not exists');
        
    }

    public function givePermission(Request $request, User $user)
    {

        if($user->hasPermissionTo($request->permission)){
            return back()->with('success', 'Permission already assigned to the user');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('success', 'Permission added successfully');
        
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            return back()->with('success', 'Permission revoke successfully');
        }
        return back()->with('success', 'Permission not exists');
        
    }
}
