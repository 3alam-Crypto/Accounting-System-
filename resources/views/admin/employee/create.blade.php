@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
    
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="card-title">{{ __('keyword.Add Employee') }}</h1>
        </div>
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-body">
            <form action="{{ route('store-employee') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="installment_amount">{{ __('keyword.First Name:') }}</label>
                        <input type="text" name="first_name" id="first_name" class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="installment_amount">{{ __('keyword.Last Name:') }}</label>
                        <input type="text" name="last_name" id="last_name" class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="installment_amount">{{ __('keyword.Address:') }}</label>
                        <input type="text" name="address" id="address" class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="installment_amount">{{ __('keyword.Phone:') }}</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="email">{{ __('keyword.Email:') }}</label><br>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="salary">{{ __('keyword.Salary:') }}</label><br>
                        <input type="text" id="salary" name="salary" class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="start_date">{{ __('keyword.Start Date:') }}</label><br>
                        <input type="date" id="start_date" name="start_date" class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="payout_date">{{ __('keyword.Payout Date:') }}</label><br>
                        <input type="text" id="payout_date" name="payout_date" class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="birthdate">{{ __('keyword.Birthdate:') }}</label><br>
                        <input type="date" id="birthdate" name="birthdate" class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="id_file">{{ __('keyword.ID File:') }}</label>
                        <input type="file" id="id_file" name="id_file" class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="id_number">{{ __('keyword.ID Number:') }}</label>
                        <input type="text" id="id_number" name="id_number" class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="country_id">{{ __('keyword.Country:') }}</label>
                        <select id="country_id" name="country_id" class="form-control">
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="department">{{ __('keyword.Department:') }}</label>
                        <input type="text" id="department" name="department" class="form-control">
                    </div>
                </div>


                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="citizen">{{ __('keyword.Citizen:') }}</label>
                        <input type="text" id="citizen" name="citizen" class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="contract_end_date">{{ __('keyword.Contract End Date:') }}</label>
                        <input type="date" id="contract_end_date" name="contract_end_date" class="form-control">
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
