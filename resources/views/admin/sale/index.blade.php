@extends('layouts.master')

@section('content')

<div class="container">
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="card-title">Sales</h3>
                            <!--begin::Primary button-->
                            <a href="{{ route('create-sale') }}" class="btn btn-sm fw-bold btn-primary px-4 py-2">Add Sale</a>
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
                                    <th>Shipping Date</th>
                                    <th>Our Order </th>
                                    <th>Order Date</th>
                                    <th>Customer Name</th>
                                    <th>Product Name</th>
                                    <th>Product Model</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $sale)
                                <tr>
                                    <td>{{ $sale->shipping_date }}</td>
                                    <td>{{ $sale->our_order_id }}</td>
                                    <td>{{ $sale->order_date }}</td>
                                    <td>{{ $sale->customer_name }}</td>
                                    <td>{{ $sale->product_name }}</td>
                                    <td>{{ $sale->product_model }}</td>
                                    <td style="display: flex; align-items: center;">
                                        <a href="{{ route('edit-sale', $sale->id)}}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('view-sale', $sale->id)}}" class="btn btn-success space">View</a>
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