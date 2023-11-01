@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
    
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
                    <input type="text" name="name" class="form-control" value="{{ $roles->name }}">
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
    </div>
</div>
@endsection
