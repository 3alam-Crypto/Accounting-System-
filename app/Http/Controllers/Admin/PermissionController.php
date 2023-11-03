<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Spatie\Permission\Models\Role;


class PermissionController extends Controller
{
    public function index() {
        $permission = Permission::all();
        return view('admin.permission.index', compact('permission'));
    }

    public function create() {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        Permission::create(['name' => $request->input('name')]);

        return redirect()->route('permission')->with('success', 'Permission created successfully');
    }

    public function edit(Permission $permissions)
    {
        return view('admin.permission.edit', compact('permissions'));
    }

    public function update(Request $request, Permission $permissions)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        $permissions->update(['name' => $request->input('name')]);

        return redirect()->route('permission')->with('success', 'Permission Update successfully');
    }

    public function destroy(Permission $permission)
    {
        
        $usersWithPermission = User::permission($permission)->get();
        $rolesWithPermission = Role::permission($permission)->get();
        
        foreach ($usersWithPermission as $user) {
        
            $user->revokePermissionTo($permission);
        }
        
        foreach ($rolesWithPermission as $role) {
            $role->revokePermissionTo($permission);
        }
        $permission->delete();
        return redirect()->route('permission')->with('success', 'Permission deleted successfully');
    }
}
