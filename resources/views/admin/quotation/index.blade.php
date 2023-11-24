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
                            <a href="{{ route('create-quotation') }}" class="btn btn-sm fw-bold btn-primary px-4 py-2">Add Quotation</a>
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
