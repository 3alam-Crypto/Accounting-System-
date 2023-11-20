@extends('layouts.master')

@section('content')

<div class="container">
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="card-title">Awaiting Shipping Sales</h3>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <table id="myDataTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Our Order ID</th>
                                    <th>Shipping Due Date</th>
                                    <th>Tracking Number 1</th>
                                    <th>Tracking Number 2</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($awaitingShippingSales as $sale)
                                <tr>
                                    <td>{{ $sale->our_order_id }}</td>
                                    <td>{{ $sale->due_date_shipping }}</td>
                                    <td>{{ $sale->tracking_number_1 }}</td>
                                    <td>{{ $sale->tracking_number_2 }}</td>
                                    <td style="display: flex; align-items: center;">
                                        <a href="{{ route('edit-sale', $sale->id)}}" class="btn btn-success">Edit</a>

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
