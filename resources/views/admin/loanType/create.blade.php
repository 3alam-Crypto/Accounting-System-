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
            <h1 class="">{{ __('keyword.Create Loan Type') }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('store-loan-type') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>{{ __('keyword.Loan Type Name') }}</label>
                    <input type="text" name="name" class="form-control small-input" value="{{ old('name') }}">
                </div>
                @error('name')
                <span class="text-sm" style="color: red;">{{ $message }}</span>
                @enderror

                <div class="mb-3">
                    <label>{{ __('keyword.Bounce') }}</label>
                    <textarea name="bounce" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>{{ __('keyword.Punishment') }}</label>
                    <textarea name="punishment" class="form-control"></textarea>
                </div>

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
