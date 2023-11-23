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
                            <a href="{{ route('create-purchaseOrder') }}" class="btn btn-sm fw-bold btn-primary px-4 py-2">Add Purchase Order</a>
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
                                    <th>TOTAL QUANTITY</th>
                                    <th>TOTAL PRICE</th>
                                    <th>CREATED AT</th>
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
