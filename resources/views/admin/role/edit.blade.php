@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="">Add Role</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('update-role', ['roles' => $roles->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Role Name</label>
                    <input type="text" name="name" class="form-control small-input" value="{{ $roles->name }}">
                </div>
                @error('name')
                <span class="text-sm" style="color: red;">{{ $message }}</span>
                @enderror

                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Save Role</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <h2 class="text-2xl font-semibold">Role Permissions</h2>
            <div class="button mt-4 p-2">
                @if($roles->permissions)
                @foreach($roles->permissions as $role_permission)
                <form method="POST" 
                action="{{ route('delete-role-permission', ['role' => $roles->id, 'permission' => $role_permission->id]) }}" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="margin-left: 10px;">{{ $role_permission->name }}</button>
                </form>
                @endforeach
                @endif
            </div>
            <div class="mt-4">
                <form action="{{ route('add-role-permission', ['role' => $roles->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <label for="permission" class="block text-sm font-medium text-gray-700">permission</label>
                    <div class="mb-3">
                        
                        <select name="permission" id="permission" autocomplete="permission-name" class="small-select">
                            @foreach ($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('name')
                    <span class="text-sm" style="color: red;">{{ $message }}</span>
                    @enderror
    
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Assign</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
