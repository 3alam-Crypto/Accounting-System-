@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
    
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="">{{ __('keyword.Add Role') }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('store-role') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>{{ __('keyword.Name Role') }}</label>
                    <input type="text" name="name" class="form-control">
                </div>
                @error('name')
                <span class="text-sm" style="color: red;">{{ $message }}</span>
                @enderror

                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">{{ __('keyword.Save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
