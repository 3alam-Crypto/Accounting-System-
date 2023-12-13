@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">
    
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="">Add Loan</h1>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('store-expenses') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-8">


                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="expenses_type_id">Expense Type</label>
                                <select name="expenses_type_id" id="expenses_type_id" class="form-select">
                                    @foreach ($expensesTypes as $expenseType)
                                        <option value="{{ $expenseType->id }}">{{ $expenseType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="installment_amount">Installment Amount</label>
                                <input type="number" name="installment_amount" id="installment_amount" class="form-control" oninput="calculateAmount()">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="installment_count">Installment Count</label>
                                <input type="number" name="installment_count" id="installment_count" class="form-control" oninput="calculateAmount()">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="amount">Amount</label>
                                <input type="hidden" name="amount" id="hidden_amount">
                                <input type="number" name="amount" id="amount" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="due_date">Due Date</label>
                                <input type="date" name="due_date" id="due_date" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="charges">Charges</label>
                                <input type="number" name="charges" id="charges" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="due_charges">Due Charges</label>
                                <input type="number" name="due_charges" id="due_charges" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="period">Period</label>
                                <select name="period" id="period" class="form-select">
                                    <option value="yearly">Yearly</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="on time">On Time</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="priority">Priority</label>
                                <select name="priority" id="priority" class="form-select">
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Save Expenses</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function calculateAmount() {
        const installmentAmount = parseFloat(document.getElementById('installment_amount').value);
        const installmentCount = parseFloat(document.getElementById('installment_count').value);
        const amount = installmentAmount * installmentCount;
        document.getElementById('amount').value = amount.toFixed(2);
        document.getElementById('hidden_amount').value = amount.toFixed(2);
    }
</script>

@endsection

