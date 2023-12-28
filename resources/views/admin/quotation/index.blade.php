@extends('layouts.master')

@section('content')

<div class="container">
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="card-title">Quotations</h3>
                            <!--begin::Primary button-->
                            <!--end::Primary button-->
                            <div class="d-flex flex-nowrap">
                                <a href="{{ route('create-quotation') }}" class="btn btn-sm fw-bold btn-primary px-4 py-2">Add Quotation</a>
                                <a href="{{ route('export-quotation') }}"
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
                                    <th>TOTAL DISCOUNT</th>
                                    <th>TOTAL TAX</th>
                                    <th>TOTAL PRICE</th>
                                    <th>CREATED AT</th>
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
