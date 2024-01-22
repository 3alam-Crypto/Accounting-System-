@extends('layouts.master')

@section('content')

<div class="container">
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="card-title">{{ __('keyword.Quotations') }}</h3>
                            <!--begin::Primary button-->
                            <!--end::Primary button-->
                            <div class="d-flex flex-nowrap">
                                <a href="{{ route('create-quotation') }}" class="btn btn-sm fw-bold btn-primary px-4 py-2">Add Quotation</a>
                                <a href="{{ route('export-quotation') }}"
                                    class="btn btn-sm fw-bold btn-primary px-4 py-2">{{ __('keyword.Export') }}</a>
                            </div>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table id="kt_table_users" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('keyword.ID') }}</th>
                                    <th>{{ __('keyword.ORDER ID') }}</th>
                                    <th>{{ __('keyword.CUSTOMER NAME') }}</th>
                                    <th>{{ __('keyword.TOTAL DISCOUNT') }}</th>
                                    <th>{{ __('keyword.TOTAL TAX') }}</th>
                                    <th>{{ __('keyword.TOTAL PRICE') }}</th>
                                    <th>{{ __('keyword.CREATED AT') }}</th>
                                    <th>{{ __('keyword.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($uniqueQuotations as $quotationProduct)
                                    <tr>
                                        <td>{{ $quotationProduct->quotation->id }}</td>
                                        <td>{{ $quotationProduct->our_id }}</td>
                                        <td>{{ $quotationProduct->quotation->customer_name }}</td>
                                        <!-- Access other fields from QuotationProduct and Quotation as needed -->
                                        <td>{{ $quotationProduct->quotation->total_discount }}</td>
                                        <td>{{ $quotationProduct->quotation->total_tax }}</td>
                                        <td>{{ $quotationProduct->quotation->total_price }}</td>
                                        <td>{{ $quotationProduct->quotation->created_at }}</td>
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
                                                    href="{{ route('download-quotation-pdf', ['id' => $quotationProduct->quotation->id]) }}"
                                                    class="menu-link px-3">Download</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('view-quotation', $quotationProduct->quotation->id) }}"
                                                    class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
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

@section('javascript')
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!-- DataTables JS -->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        // Initialize the DataTable
        $(document).ready(function() {
            $('#kt_table_users').DataTable();
        });
    </script>
@endsection
