@extends('layouts.master')

@section('content')

<div class="container">
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="d-flex justify-content-between mb-3">
                        <h3 class="card-title">Payment Plan Generator</h3>
                    </div>

                    <form action="{{ route('generatePaymentPlan') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- Laravel's CSRF protection -->

                        <div class="col-md-6">
                            <label class="form-label" for="initial_balance">Initial Balance:</label>
                            <input class="form-control" type="text" id="initial_balance" name="initial_balance"><br><br>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="start_date">Start Date:</label>
                        <input class="form-control" type="date" id="start_date" name="start_date"><br><br>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="end_date">End Date:</label>
                        <input class="form-control" type="date" id="end_date" name="end_date"><br><br>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Generate Payment Plan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function generatePaymentPlan() {
        var initialBalance = document.getElementById('initial_balance').value;
        var startDate = document.getElementById('start_date').value;
        var endDate = document.getElementById('end_date').value;

        // Prepare data for sending via AJAX
        var data = {
            initial_balance: initialBalance,
            start_date: startDate,
            end_date: endDate
        };

        // Send AJAX request to the Laravel controller
        fetch('/generate-payment-plan', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add this line if CSRF protection is enabled
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response here (e.g., display data on the page)
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>

@endsection
