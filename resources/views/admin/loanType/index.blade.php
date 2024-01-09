@extends('layouts.master')

@section('content')
<div class="container">
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="card-title">{{ __('keyword.Loan Types') }}</h3>
                            <a href="{{ route('create-loan-type') }}" class="btn btn-sm fw-bold btn-primary px-4 py-2">{{ __('keyword.Add Loan Type') }}</a>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table id="kt_table_loan_types" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('keyword.Name') }}</th>
                                    <th>{{ __('keyword.Bounce') }}</th>
                                    <th>{{ __('keyword.Punishment') }}</th>
                                    <th>{{ __('keyword.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($loanTypes as $loanType)
                                <tr>
                                    <td>{{ $loanType->name }}</td>
                                    <td>{{ $loanType->bounce }}</td>
                                    <td>{{ $loanType->punishment }}</td>
                                    
                                    <td class="text-center">
                                        <a href="#"
                                           class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                           data-kt-menu-trigger="click"
                                           data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                        </a>
                                        <!-- Dropdown Menu -->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                             data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <!-- Edit Loan Type -->
                                                <a href="{{ route('edit-loan-type', $loanType->id) }}"
                                                   class="menu-link px-3">Edit</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <!-- View Loan Type Details -->
                                                <a href="{{ route('view-loan-type', $loanType->id) }}"
                                                   class="menu-link px-3">View</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <!-- Delete Loan Type -->
                                                <a href="{{ route('delete-loan-type', $loanType->id) }}"
                                                   onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this loan type?')) { document.getElementById('delete-form-{{ $loanType->id }}').submit(); }"
                                                   class="menu-link px-3">Delete</a>
                                                <form id="delete-form-{{ $loanType->id }}"
                                                      method="POST"
                                                      action="{{ route('delete-loan-type', $loanType->id) }}"
                                                      style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Dropdown Menu End -->
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!-- DataTables JS -->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        // Initialize the DataTable
        $(document).ready(function() {
            $('#kt_table_loan_types').DataTable();
        });
    </script>
@endsection
