@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
    
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="">Add Role</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('store-user') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>User Name</label>
                    <input type="text" name="name" id="name" class="form-control small-input">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control small-input">
                </div>

                <div class="mb-3">
                    <label>password</label>
                    <input type="password" name="password" id="password" class="form-control small-input">
                </div>

                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control small-input">
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
