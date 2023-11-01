<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return view('admin.role.edit', compact('roles'));
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
}
