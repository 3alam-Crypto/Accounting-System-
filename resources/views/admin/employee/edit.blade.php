@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
    
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="card-title">{{ __('keyword.Edit Employee') }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('update-employee', ['employee' => $employee->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="installment_amount">{{ __('keyword.First Name:') }}</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $employee->first_name}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="installment_amount">{{ __('keyword.Last Name:') }}</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $employee->last_name}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="installment_amount">{{ __('keyword.Address:') }}</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ $employee->address}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="installment_amount">{{ __('keyword.Phone:') }}</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ $employee->phone}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="email">{{ __('keyword.Email:') }}</label><br>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $employee->email}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="salary">{{ __('keyword.Salary:') }}</label><br>
                        <input type="text" id="salary" name="salary" class="form-control" value="{{ $employee->salary}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="start_date">{{ __('keyword.Start Date:') }}</label><br>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $employee->start_date}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="payout_date">{{ __('keyword.Payout Date:') }}</label><br>
                        <input type="text" id="payout_date" name="payout_date" class="form-control" value="{{ $employee->payout_date}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="birthdate">{{ __('keyword.Birthdate:') }}</label><br>
                        <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{ $employee->birthdate}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="id_file">{{ __('keyword.ID File:') }}</label>
                        <input type="file" name="id_file" id="id_file" class="form-control">
                        <!-- Add a link to download the current file -->
                        @if($employee->id_file)
                            <a href="{{ $employee->id_file }}" download>{{ __('keyword.Download Current File') }}</a>
                        @endif
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="id_number">{{ __('keyword.ID Number:') }}</label>
                        <input type="text" name="id_number" id="id_number" class="form-control" value="{{ $employee->id_number }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="country" class="form-label">{{ __('keyword.Country:') }}</label>
                        <select name="country_id" id="country" autocomplete="country-name" class="form-select">
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" {{ $employee->country_id === $country->id ? 'selected' : '' }}>
                                    {{ $country->country_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="department">{{ __('keyword.Department:') }}</label>
                        <input type="text" name="department" id="department" class="form-control" value="{{ $employee->department }}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="citizen">{{ __('keyword.Citizen:') }}</label>
                        <input type="text" name="citizen" id="citizen" class="form-control" value="{{ $employee->citizen }}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="contract_end_date">{{ __('keyword.Contract End Date:') }}</label>
                        <input type="date" name="contract_end_date" id="contract_end_date" class="form-control" value="{{ $employee->contract_end_date }}">
                    </div>
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
