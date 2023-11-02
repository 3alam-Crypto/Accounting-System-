<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.role.index', compact('role'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        Role::create(['name' => $request->input('name')]);

        return redirect()->route('role')->with('success', 'Role created successfully');
    }

    public function edit(Role $roles)
    {
        $permissions = Permission::all();
        return view('admin.role.edit', compact('roles', 'permissions'));
    }

    public function update(Request $request, Role $roles)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        $roles->update(['name' => $request->input('name')]);

        return redirect()->route('role')->with('success', 'Role Update successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role')->with('success', 'Role deleted successfully');
    }

    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)){
            return back()->with('success', 'Permission exists');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('success', 'Permission added successfully');
    }

    public function revokePermission(Role $role, Permission $permission ) 
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('success', 'Permission revoke successfully');
        }
        return back()->with('success', 'Permission not exists');
    }
}
