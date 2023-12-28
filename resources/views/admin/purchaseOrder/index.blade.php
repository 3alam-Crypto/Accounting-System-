@extends('layouts.master')

@section('content')

<div class="container">
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="card-title">Purchase Orders</h3>
                            <!--begin::Primary button-->

                            <!--end::Primary button-->
                            <div class="d-flex flex-nowrap">
                                <a href="{{ route('create-purchaseOrder') }}" class="btn btn-sm fw-bold btn-primary px-4 py-2">Add Purchase Order</a>
                                <a href="{{ route('export-purchaseOrder') }}"
                                    class="btn btn-sm fw-bold btn-primary px-4 py-2">Export</a>
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
                                    <th>ID</th>
                                    <th>ORDER ID</th>
                                    <th>CUSTOMER NAME</th>
                                    <th>TOTAL QUANTITY</th>
                                    <th>TOTAL PRICE</th>
                                    <th>CREATED AT</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($uniquePurchaseOrders as $orderProduct)
                                <tr>
                                    <td>{{ $orderProduct->id }}</td>
                                    <td>{{ optional($orderProduct->brand)->code }}-{{ $orderProduct->our_id }}</td>
                                    <td>{{ $orderProduct->purchaseOrder->customer_name }}</td>
                                    <td>{{ $orderProduct->purchaseOrder->total_quantity }}</td>
                                    <td>{{ $orderProduct->purchaseOrder->total_price }}</td>
                                    <td>{{ $orderProduct->purchaseOrder->created_at }}</td>
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
                                                    href="{{ route('edit-purchaseOrder', $orderProduct->id) }}"
                                                    class="menu-link px-3">Edit</a>
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

