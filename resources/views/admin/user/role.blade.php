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
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-primary mt-3" href="{{ route('user') }}">Back</a>
                </div>
            </div>
            <div>
                <div>User Name:{{ $user->name }}</div>
                <div>User Email:{{ $user->email }}</div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('update-user', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>User Name</label>
                    <input type="text" name="name" class="form-control small-input" value="{{ $user->name }}">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control small-input" value="{{ $user->email}}">
                </div>  

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control small-input">
                </div> 

                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Save User</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">
            <h2 class="text-2xl font-semibold">Role User</h2>
            <div class="button mt-4 p-2">
                @if($user->roles)
                @foreach($user->roles as $user_role)
                <form method="POST" 
                action="{{ route('delete-role-user', ['user' => $user->id, 'role' => $user_role->id]) }}" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="margin-left: 10px;">{{ $user_role->name }}</button>
                </form>
                @endforeach
                @endif
            </div>
            <div class="mt-4">
                <form action="{{ route('add-role-user', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <div class="mb-3">
                        
                        <select name="role" id="role" autocomplete="permission-name" class="small-select">
                            @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
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

        <!--<div class="card-body">
            <h2 class="text-2xl font-semibold">Permissions User</h2>
            <div class="button mt-4 p-2">
                @if($user->permissions)
                @foreach($user->permissions as $user_permission)
                <form method="POST" 
                action="{{ route('delete-user-permission', ['user' => $user->id, 'permission' => $user_permission->id]) }}" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="margin-left: 10px;">{{ $user_permission->name }}</button>
                </form>
                @endforeach
                @endif
            </div>
            <div class="mt-4">
                <form action="{{ route('add-user-permission', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
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
        </div>-->
    </div>
</div>
@endsection
