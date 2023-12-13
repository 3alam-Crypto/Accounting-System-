@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
    
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="">Add Employee</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('update-employee', ['employee' => $employee->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="installment_amount">First Name:</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $employee->first_name}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="installment_amount">Last Name:</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $employee->last_name}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="installment_amount">Address:</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ $employee->address}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="installment_amount">Phone:</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ $employee->phone}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $employee->email}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="salary">Salary:</label><br>
                        <input type="text" id="salary" name="salary" class="form-control" value="{{ $employee->salary}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="start_date">Start Date:</label><br>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $employee->start_date}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="payout_date">Payout Date:</label><br>
                        <input type="text" id="payout_date" name="payout_date" class="form-control" value="{{ $employee->payout_date}}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="birthdate">Birthdate:</label><br>
                        <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{ $employee->birthdate}}">
                    </div>
                </div>

                @error('name')
                <span class="text-sm" style="color: red;">{{ $message }}</span>
                @enderror

                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
