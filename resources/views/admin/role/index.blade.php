@extends('layouts.master')

@section('content')
<div class="container">
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="card-title">{{ __('keyword.Roles') }}</h3>
                            <!--begin::Primary button-->
                            <a href="{{ route('create-role') }}" class="btn btn-sm fw-bold btn-primary px-4 py-2">{{ __('keyword.Add Role') }}</a>
                            <!--end::Primary button-->
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table id="myDataTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('keyword.Name Role') }}</th>
                                    <th>{{ __('keyword.Actions') }}v</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($role as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td class="text-center">
                                        <a
                                            href="#"
                                            class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                            data-kt-menu-trigger="click"
                                            data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                        </a>
                                        <!--begin::Menu-->
                                        <div
                                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a
                                                    href="{{ route('edit-role', $role->id) }}"
                                                    class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!-- Update Delete section -->
                                            <div class="menu-item px-3">
                                                <a
                                                    href="{{ route('delete-role', $role->id) }}"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this expenses type?')) { document.getElementById('delete-form-{{ $role->id}}').submit(); }"
                                                    class="menu-link px-3">Delete</a>
                                                <form
                                                    id="delete-form-{{ $role->id}}"
                                                    method="POST"
                                                    action="{{ route('delete-role', $role->id) }}"
                                                    style="display: none;">
                                                    @csrf @method('DELETE')
                                                </form>
                                            </div>
                                            <!-- View section -->
                                        </div>
                                        <!--end::Menu-->
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
